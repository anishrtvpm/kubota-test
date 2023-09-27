<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faqs_categories';

    /**
     * Total records
     */

    public function totalRecords()
    {
        return self::select('count(*) as allcount')->count();
    }

    public function recordsWithFilter($offset, $chunkSize, $columnName, $columnSortOrder, $type = '')
    {
        if ($type == config('constants.get_type_count')) {
            $systemLinkData = FaqCategory::select('count(*) as allcount');
            return $systemLinkData->count();
        } else {
            $systemLinkData = FaqCategory::orderBy($columnName, $columnSortOrder);
            return $systemLinkData->skip($offset)->take($chunkSize)->get();
        }
    }

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

        /**
         * Total records with filter
         */

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
}
