<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faqs_categories';
    const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'category_id';
    /**
     * count of total records for table listing
     * @return integer
     */

    public function totalRecords()
    {
        return self::select('count(*) as allcount')->count();
    }


    /**
     * get array of data or total count of data with filter(if any) 
     * @param integer $offset
     * @param integer $chunkSize
     * @param string $columnName
     * @param string $columnSortOrder
     * @param string $type
     * @return mixed for data array
     */
    public function recordsWithFilter($offset, $chunkSize, $columnName, $columnSortOrder, $type = '')
    {
        if ($type == config('constants.get_type_count')) {
            $faqCategoryData = FaqCategory::select('count(*) as allcount');
            $faqCategoryData->where('is_deleted', config('constants.active'));
            return $faqCategoryData->count();
        } else {
            $faqCategoryData = FaqCategory::orderBy($columnName, $columnSortOrder);
            $faqCategoryData->where('is_deleted', config('constants.active'));
            return $faqCategoryData->skip($offset)->take($chunkSize)->get();
        }
    }

    /**
     * Total records with filter
     * @return array
     */

    public function getFilteredData($request)
    {
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndexArr = $request->get('order');
        $columnNameArr = $request->get('columns');
        $orderArr = $request->get('order');
        $columnIndex = $columnIndexArr[0]['column']; // Column index
        $columnName = $columnNameArr[$columnIndex]['data']; // Column name
        $columnSortOrder = $orderArr[0]['dir']; // asc or desc

        $records = $this->recordsWithFilter($start, $rowperpage, $columnName, $columnSortOrder, '');
        $dataArr = array();
        if ($records) {
            foreach ($records as $record) {
                $dataArr[] = array(
                    "category_id" => $record->category_id,
                    "top_category_ja_name" => $record->top_category_ja_name,
                    "top_category_en_name" => $record->top_category_en_name,
                    "sub_category_ja_name" => $record->sub_category_ja_name,
                    "sub_category_en_name" => $record->sub_category_en_name,
                    "sort" => $record->sort,
                    "status" => $record->status,
                    "mail_form_id" => $record->mail_form_id,
                );
            }
        }
        return $dataArr;
    }

    /**
     * To insert and update data
     * @return mixed
     */

    public function saveRecords($request)
    {
        try {
            $id = $request->get('faq_category_id');
            $faqCategory = $id ? FaqCategory::where('category_id', $id)->first() : new FaqCategory;
            $faqCategory->top_category_ja_name = $request->input('top_category_ja_name');
            $faqCategory->top_category_en_name = $request->input('top_category_en_name');
            $faqCategory->sub_category_ja_name = $request->input('sub_category_ja_name');
            $faqCategory->sub_category_en_name = $request->input('sub_category_en_name');
            $faqCategory->sort = $request->input('sort');
            $faqCategory->status = $request->get('status');
            $faqCategory->mail_form_id = $request->input('mail_form_id');
            $faqCategory->save();
            return $faqCategory->category_id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function categoryCombinationExists($request)
    {

        $top_category_ja_name = $request->input('top_category_ja_name');
        $sub_category_ja_name = $request->input('sub_category_ja_name');
        $top_category_en_name = $request->input('top_category_en_name');
        $sub_category_en_name = $request->input('sub_category_en_name');
        
        $error =false;
        $message = [];

        $categoryId = $request->input('faq_category_id');
        if ($categoryId) {
            $jaComb = FaqCategory::where('top_category_ja_name', $top_category_ja_name)
                ->where('sub_category_ja_name', $sub_category_ja_name)
                ->where('category_id', '!=', $categoryId)
                ->first();
            $enComb = FaqCategory::where('top_category_en_name', $top_category_en_name)
                ->where('sub_category_en_name', $sub_category_en_name)
                ->where('category_id', '!=', $categoryId)
                ->first();
        } else {

            $jaComb = FaqCategory::where('top_category_ja_name', $top_category_ja_name)
                ->where('sub_category_ja_name', $sub_category_ja_name)
                ->first();
            $enComb = FaqCategory::where('top_category_en_name', $top_category_en_name)
                ->where('sub_category_en_name', $sub_category_en_name)
                ->first();
        }

        if ($jaComb) {
            $error = true;
            $message[] = 'Jaカテゴリの組み合わせはすでに存在する。';
        }
        if ($enComb) {
            $error = true;
            $message[] = 'Enカテゴリの組み合わせはすでに存在する。';
        }

        return  ['error'=>$error,'message'=>$message];
    }
}