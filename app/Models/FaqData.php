<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqData extends Model
{
  use HasFactory;
  //テーブル名の指定
  protected $table = 'faqs_data';
  //主キー
  protected $primaryKey = ['faq_id'];
  //IDの自動増分をしない
  public $incrementing = false;
  //Framework指定のタイムスタンプは使用しない
  public $timestamps = false;

  protected $fillable = [
    'faq_id',
    'category_id',
    'sort',
    'title',
    'q_message',
    'a_message',
    'search_qa_message',
    'image_path1',
    'image_path2',
    'image_path3',
    'reference_url',
    'question_date',
    'answer_date',
    'responder',
    'status',
    'language',
    'display_group',
    'is_deleted',
    'created_user',
    'modified_at',
    'modified_user',
  ];

  public function faqCategory()
  {
    return $this->belongsTo(FaqCategory::class, 'category_id', 'category_id');
  }

  /**
   * count of total records for table listing
   * @return integer
   */
  public function totalRecords()
  {
    return self::select('count(*) as allcount')->count();
  }


  /**
   * Get array of data or total count of data with filter(if any) 
   * @param integer $offset
   * @param integer $chunkSize
   * @param string $columnName
   * @param string $columnSortOrder
   * @param string $type
   * @return array for data array
   */
  public function getFaqData($offset, $chunkSize, $columnName, $columnSortOrder, $type = '', $request)
  {

    $search_keyword = $request->get('inputkeyword');
    if ($type == config('constants.get_type_count')) {
      $faqData = FaqData::select('faqs_data.*', 'faqs_categories.top_category_ja_name AS top_category', 'faqs_categories.sub_category_ja_name AS sub_category');

    } else {
      $faqData = FaqData::select('faqs_data.*', 'faqs_categories.top_category_ja_name AS top_category', 'faqs_categories.sub_category_ja_name AS sub_category')->orderBy($columnName, $columnSortOrder);
    }
    $faqData->join('faqs_categories', 'faqs_data.category_id', '=', 'faqs_categories.category_id');

    // filter for sub category
    if (!empty($request->get('inlineFormSelectCatChild'))) {
      $faqData->where('faqs_data.category_id', $request->get('inlineFormSelectCatChild'));
    } elseif (!empty($request->get('inlineFormSelectCatParent'))) {
      $faqData->where('faqs_categories.top_category_ja_name', $request->get('inlineFormSelectCatParent'));

    }

    // filter language
    if (!empty($request->get('inlineFormSelectLanguage'))) {
      $faqData->where('faqs_data.language', $request->get('inlineFormSelectLanguage'));
    }

    // filter status
    if (!is_null($request->get('inlineFormStatus'))) {
      $faqData->where('faqs_data.status', $request->get('inlineFormStatus'));
    }

    if (!empty($search_keyword)) {
      $faqData->where(function ($query) use ($search_keyword) {
        $halfName = mb_convert_kana($search_keyword, 'k');
        $fullName = mb_convert_kana($search_keyword, 'KV');
        $query->where("faqs_data.title", "like", '%' . $halfName . '%')
          ->orWhere("faqs_data.title", "like", '%' . $fullName . '%')
          ->orWhere('faqs_data.title', 'like', '%' . $search_keyword . '%');
      });
    }

    // show only non deleted items
    $faqData->where('faqs_data.is_deleted', config('constants.active'));
    return ($type == config('constants.get_type_count')) ? $faqData->count() : $faqData->skip($offset)->take($chunkSize)->get();
  }

  /**
   * Get filtered records of faq items
   * @return array
   */
  public function getFilteredData($request, $type)
  {
    $start = $request->get("start");
    $rowperpage = $request->get("length"); // Rows display per page
    $columnIndexArr = $request->get('order');
    $columnNameArr = $request->get('columns');
    $orderArr = $request->get('order');
    $columnIndex = $columnIndexArr[0]['column']; // Column index
    $columnName = $columnNameArr[$columnIndex]['data']; // Column name
    $columnSortOrder = $orderArr[0]['dir']; // asc or desc

    $records = $this->getFaqData($start, $rowperpage, $columnName, $columnSortOrder, '', $request);
    $dataArr = array();
    if ($records) {
      foreach ($records as $record) {
        $dataArr[] = array(
          "faq_id" => $record->faq_id,
          "category_id" => getLanguageString($record->language),
          "top_category_ja_name" => $record->top_category,
          "sub_category_ja_name" => $record->sub_category,
          "sort" => $record->sort,
          "title" => $record->title,
          "status" => $record->status,
          'question_date' => dateFormat($record->question_date, config('constants.date_format_ymd')),
          'answer_date' => dateFormat($record->answer_date, config('constants.date_format_ymd')),
          'responder' => $record->responder
        );
      }
    }
    return $dataArr;
  }

  /**
   *
   * This method retrieves and returns a list of faq data.
   *
   * @param  $request
   * @param  $groupId
   * @return array
   */
  public function getFaqList($request, $groupId)
  {
    $language = app()->getLocale();
    $search_keyword = $request->get('search_keyword');
    $top_category = $request->get('top_category');
    $sub_category = $request->get('sub_category');

    $topCategoryfield = 'top_category_' . $language . '_name';

    $faqData = FaqData::select('faq_id', 'category_id', 'title', 'q_message', 'search_qa_message');
    if ($search_keyword != null) {
      $faqData->where(function ($query) use ($search_keyword) {
        $halfName = mb_convert_kana($search_keyword, 'k');
        $fullName = mb_convert_kana($search_keyword, 'KV');
        $query->where("search_qa_message", "LIKE", '%' . $halfName . '%')
          ->orWhere("search_qa_message", "LIKE", '%' . $fullName . '%')
          ->orWhere('search_qa_message', 'LIKE', '%' . $search_keyword . '%');
      });
    }

    if ($top_category != "") {
      $categories = FaqCategory::select('category_id')
        ->where('is_deleted', config('constants.active'))
        ->where($topCategoryfield, $top_category)
        ->orderBy('category_id', 'asc')
        ->get()->toArray();
      $categoryIds = array_column($categories, 'category_id');
      $faqData->whereIn('category_id', $categoryIds);
    }
    if ($sub_category != "") {
      $faqData->where('category_id', $sub_category);
    }
    $faqData->whereRaw('FIND_IN_SET(?, display_group)', [$groupId]);
    $faqData->where('status', config('constants.public'));
    $faqData->where('is_deleted', config('constants.active'));
    $faqData->orderBy('sort', 'asc');
    return $faqData->paginate(config('constants.data_table_per_page'));
  }

  /**
   *
   * This method retrieves details of specific faq
   *
   * @param  $id
   * @return array
   */
  public function getFaqDetail($id, $groupId)
  {

    $language = app()->getLocale();
    $topCategoryfield = 'top_category_' . $language . '_name';
    $subCategoryfield = 'sub_category_' . $language . '_name';

    return FaqData::select('faqs_data.*', 'faqs_categories.' . $topCategoryfield, 'faqs_categories.' . $subCategoryfield)
      ->join('faqs_categories', 'faqs_data.category_id', '=', 'faqs_categories.category_id')
      ->where('faqs_data.faq_id', $id)
      ->where('faqs_data.status', config('constants.public'))
      ->where('faqs_data.is_deleted', config('constants.active'))
      ->whereRaw('FIND_IN_SET(?, faqs_data.display_group)', [$groupId])
      ->get();
  }
}