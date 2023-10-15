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
     * Get array of data or total count of data with filter(if any) 
     * @param integer $offset
     * @param integer $chunkSize
     * @param string $columnName
     * @param string $columnSortOrder
     * @param string $type
     * @return array for data array
     */    
    public function getFaqData($offset, $chunkSize, $columnName, $columnSortOrder, $type = '')
    {
        if ($type == config('constants.get_type_count')) {
            $faqData = FaqData::select('count(*) as allcount');
            $faqData->where('is_deleted', config('constants.active')); // Should we check this? If deleted items can be shown here?
            return $faqData->count();
        } else {
            $faqData = FaqData::orderBy($columnName, $columnSortOrder);
            $faqData->where('is_deleted', config('constants.active')); // Should we check this? If deleted items can be shown here?
            return $faqData->skip($offset)->take($chunkSize)->get();
        }
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
 
         $records = $this->getFaqData($start, $rowperpage, $columnName, $columnSortOrder, '');
         $dataArr = array();
         if ($records) {
             foreach ($records as $record) {
                 $dataArr[] = array(
                     "faq_id" => $record->faq_id,
                     "category_id" => getLanguageString($record->language),
                     "top_category_ja_name" => 'System',
                     "sub_category_ja_name" => 'Sub category',
                     "sort" => $record->sort,
                     "title" => $record->titles,
                     "status" => $record->status                   
                 );
             }
         }
         return $dataArr;
     }



}
