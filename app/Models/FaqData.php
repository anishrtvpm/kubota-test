<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqData extends Model
{
  use HasFactory;
  protected $table = 'faqs_data';
  protected $primaryKey = 'faq_id';

  const UPDATED_AT = 'modified_at';

  protected $Fillable = [
    'category_id',
    'sort',
    'title',
    'q_message',
    'a_message',
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
  ];

  /**
   * To fetch the top categories list as system
   *
   */
  public function getTopCategories()
  {
    return FaqCategory::select('top_category_ja_name as name')
      ->where('is_deleted', 0)
      ->groupBy('top_category_ja_name')
      ->orderBy('category_id', 'asc')
      ->get();
  }

  /**
   * To fetch the sub categories based on system name
   * @param object $request
   * @return mixed
   */
  public function getSubCategories($request)
  {
    $categories = FaqCategory::select('category_id', 'sub_category_ja_name as name')
      ->where('is_deleted', 0)
      ->where('top_category_ja_name', $request->input('name'))
      ->orderBy('category_id', 'asc')
      ->get();
    return response()->json($categories);
  }

  /**
   * Custom validation rules
   * @param object $request
   * @return mixed
   */
  public function validateInputData($request)
  {
    $response['error'] = $response['message'] = $response['field'] = '';
    $sortOrderExists = $this->checkSortOrderExists($request);
    if ($sortOrderExists) {
      $response['error'] = true;
      $response['message'] = "選択されたカテゴリーにすでに表示順が存在する";
      $response['field'] = 'sort';
    }
    return $response;
  }

  /**
   * Check sort order existance based on selected category
   * @param object $request
   * @return int
   */
  public function checkSortOrderExists($request)
  {
    $sort = $request->input('sort');
    $faqId = $request->input('faq_id');
    $categoryId = $request->input('category_id');

    $faq = self::where('sort', $sort)->where('category_id', $categoryId);
    if ($faqId) {
      return $faq->where('faq_id', '!=', $faqId)->count();
    } else {
      return $faq->count();
    }
  }

  /**
   * Create/Update faq data
   * @param object $request
   * @return mixed
   */
  public function saveRecords($request)
  {

    try {

      $id = $request->get('faq_id');
      $faqData = $id ? self::where('faq_id', $id)->first() : new FaqData;
      $faqData->category_id = $request->input('category_id');
      $faqData->sort = $request->input('sort');
      $faqData->title = $request->input('title');
      $faqData->q_message = $request->input('q_message');
      $faqData->a_message = $request->input('a_message');
      $faqData->reference_url = $request->input('reference_url');
      $faqData->question_date = $request->input('question_date');
      $faqData->answer_date = $request->input('answer_date');
      $faqData->responder = $request->input('responder');
      $faqData->status = $request->get('status');
      $faqData->language = $request->input('language');
      $faqData->display_group = $request->input('display_group') ? implode(',', $request->input('display_group')) : null;
      if ($request->hasFile('files')) {
        $filePaths = [];
        foreach ($request->file('files') as $file) {
          $filePath = $file->store('uploads');
          $filePaths[] = pathinfo($filePath, PATHINFO_FILENAME);
        }
        $faqData->image_path1 = $filePaths[0] ?? null;
        $faqData->image_path2 = $filePaths[1] ?? null;
        $faqData->image_path3 = $filePaths[2] ?? null;
      }
      if ($id) {
        $faqData->modified_user = authUser()->guid;
      } else {
        $faqData->created_user = authUser()->guid;
      }
      if ($faqData->save()) {
        return $faqData->faq_id;
      }
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Fetch faq article data
   * @param integer $id
   * @return object
   */
  public function getFaqData($id)
  {
    $faqData = self::where('faq_id', $id)->where('is_deleted', config('constants.active'))->first();
    $faqData->top_category_name = $this->getTopCategoryName($faqData->category_id);
    return $faqData;
  }

  /**
   * Fetch system name from category id
   * @param integer $category_id
   * @return string
   */
  public function getTopCategoryName($category_id)
  {
    return FaqCategory::select('top_category_ja_name')->where('category_id', $category_id)
      ->first()->top_category_ja_name;
  }


  /**
   * Delete faq data
   * @param object $request
   * @return boolean
   */

  public function deleteRecord($request)
  {
    $faq = self::where('faq_id', $request->id)->first();
    $faq->is_deleted = config('constants.inactive');
    $faq->modified_user = authUser()->guid;
    if ($faq->save()) {
      return true;
    }
    return false;
  }

}