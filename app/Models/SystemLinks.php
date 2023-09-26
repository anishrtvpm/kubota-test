<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLinks extends Model
{
    use HasFactory;
    protected $table = 'system_links';

    /**
     * Total records
     */

     public function totalRecords()
     {
         return self::select('count(*) as allcount')->count();
     }
 
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
 

         /**
          * Total records with filter
          */
 
         $records = $this->getSystemLinkData($request, $start, $rowperpage, $columnName, $columnSortOrder,'');
         $dataArr = array();
         if ($records) {
             foreach ($records as $record) {
                 $dataArr[] = array(
                    "system_id" => $record->system_id,
                    "category_id" => $record->category_id,
                    "sort" => $record->sort,
                    "ja_system_name" => $record->ja_system_name,
                    "en_system_name" => $record->en_system_name,
                    "ja_url" => $record->ja_url,
                    "en_url" => $record->en_url,
                 );
             }
         }
         return $dataArr;
     }
 
     /**
      * Get system links count and data for listing and csv export
      */
     public function getSystemLinkData($request, $offset, $chunkSize, $columnName, $columnSortOrder, $type = '')
     {
         if ($type == config('constants.get_type_count')) {
             $systemLinkData = SystemLinks::select('count(*) as allcount');
         } else {
             $systemLinkData = SystemLinks::orderBy($columnName, $columnSortOrder);
         }
         if ($type == config('constants.get_type_count')) {
            return $systemLinkData->count();
        } else {
            return $systemLinkData->skip($offset)->take($chunkSize)->get();
        }
 
     }
}
