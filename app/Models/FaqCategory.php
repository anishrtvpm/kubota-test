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

    public function validateInputData($request)
    {
        $response['error'] = $response['message'] = $response['field'] = '';
        $jaCategoryCombinationExists = $this->jaCategoryCombinationExists($request);
        $enCategoryCombinationExists = $this->enCategoryCombinationExists($request);

        if ($jaCategoryCombinationExists) {
            $response['error'] = true;
            $response['message'] = "同じ組み合わせのカテゴリーがすでに存在する";
            $response['field'] = 'ja';
        } elseif ($enCategoryCombinationExists) {
            $response['error'] = true;
            $response['message'] = "同じ組み合わせのカテゴリーがすでに存在する";
            $response['field'] = 'en';
        }

        return $response;
    }
    public function jaCategoryCombinationExists($request)
    {

        $top_category_ja_name = $request->input('top_category_ja_name');
        $sub_category_ja_name = $request->input('sub_category_ja_name');

        $categoryId = $request->input('faq_category_id');

        $jaComb = FaqCategory::where(function ($query) use ($top_category_ja_name, $sub_category_ja_name) {
            $topCategoryhalfName = mb_convert_kana($top_category_ja_name, 'k');
            $topCategoryfullName = mb_convert_kana($top_category_ja_name, 'KV');

            $subCategoryhalfName = mb_convert_kana($sub_category_ja_name, 'k');
            $subCategoryfullName = mb_convert_kana($sub_category_ja_name, 'KV');

            $query->where(function ($query) use ($topCategoryhalfName, $topCategoryfullName) {
                $query->where('top_category_ja_name', 'like', $topCategoryhalfName)
                    ->orWhere('top_category_ja_name', 'like', $topCategoryfullName);
            });

            $query->Where(function ($query) use ($subCategoryhalfName, $subCategoryfullName) {
                $query->where('sub_category_ja_name', 'like', $subCategoryhalfName)
                    ->orWhere('sub_category_ja_name', 'like', $subCategoryfullName);
            });
            $query->Where('top_category_ja_name', 'like', $top_category_ja_name)
                ->Where('sub_category_ja_name', 'like', $sub_category_ja_name);
        });
        if ($categoryId) {
            return $jaComb = $jaComb->where('category_id', '!=', $categoryId)->first();
        } else {
            return $jaComb = $jaComb->first();
        }
    }

    public function enCategoryCombinationExists($request)
    {
        $top_category_en_name = $request->input('top_category_en_name');
        $sub_category_en_name = $request->input('sub_category_en_name');
        $categoryId = $request->input('faq_category_id');
        $enComb = FaqCategory::where('top_category_en_name', $top_category_en_name)
            ->where('sub_category_en_name', $sub_category_en_name);
        if ($categoryId) {
            return $enComb = $enComb->where('category_id', '!=', $categoryId)->first();
        } else {
            return $enComb = $enComb->first();
        }
    }


    public function getTopCategories()
    {
        $language = app()->getLocale();
        $topCategory = 'top_category_' . $language . '_name';
        return FaqCategory::select($topCategory.' as name')
            ->where('is_deleted', 0)
            ->groupBy('top_category_ja_name')
            ->orderBy('category_id', 'asc')
            ->get();
    }

    public function getSubCategories($request)
    {
        $language = app()->getLocale();
        $subCategory = 'sub_category_' . $language . '_name';
        $topCategory = 'top_category_' . $language . '_name';
        $categories = FaqCategory::select('category_id', $subCategory.' as name')
            ->where('is_deleted', 0)
            ->where($topCategory, $request->get('top_category_id'))
            ->orderBy('category_id', 'asc')
            ->get();
        $option="<option value='' selected>Select</option>";
        if(!empty($categories)){
            foreach($categories as $cat){
                $option .="<option value=".$cat->category_id.">".$cat->name."</option>";
            }
        }
        return response()->json($option);
    }


    public function getFaqCategory()
    {
        $language = app()->getLocale();
        $topCategory = 'top_category_' . $language . '_name';
        $subCategory = 'sub_category_' . $language . '_name';

        $results = FaqCategory::select($topCategory, $subCategory, 'category_id')
            ->where('status', config('constants.public'))
            ->orderBy('sort', 'asc')
            ->get();

        $category = [];
        if ($results) {
            foreach ($results as $res) {
                $category['mainCategory'][] = ['category_id' => $res->category_id, 'topCategory' => $res->$topCategory];
                $category['subCategory'][] = ['category_id' => $res->category_id, 'subCategory' => $res->$subCategory];
            }
            return $category;
        }
        return false;
    }
}