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
  protected $primaryKey = 'faq_id';
  //IDの自動増分をしない
  public $incrementing = false;
  //Framework指定のタイムスタンプは使用しない
  public $timestamps = false;

  const UPDATED_AT = 'modified_at';


  protected $Fillable = [
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

    $faqData = FaqData::select('faq_id', 'category_id', 'title', 'q_message');
    if ($search_keyword != null) {
      $faqData->where(function ($query) use ($search_keyword) {
        $halfName = mb_convert_kana($search_keyword, 'k');
        $fullName = mb_convert_kana($search_keyword, 'KV');
        $query->where("title", "like", '%' . $halfName . '%')
          ->orWhere("title", "like", '%' . $fullName . '%')
          ->orWhere('title', 'like', '%' . $search_keyword . '%');
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
    $faqData ->where('is_deleted', config('constants.active'));
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