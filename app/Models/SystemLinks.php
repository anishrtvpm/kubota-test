<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SystemLinks extends Model
{
    use HasFactory;
    protected $table = 'system_links';
    const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'system_id';
    public function systemLinkCategory()
    {
        return $this->belongsTo(SystemLinkCategory::class, 'category_id', 'category_id');
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
     * Total records with filter
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


        /**
         * Total records with filter
         */

        $records = $this->getSystemLinkData($start, $rowperpage, $columnName, $columnSortOrder, '');
        $dataArr = array();
        if ($records) {
            foreach ($records as $record) {
                $dataArr[] = array(
                    "system_id" => $record->system_id,
                    "category_id" => $record->systemLinkCategory->ja_category_name,
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
     * get array of data or total count of data with filter(if any) 
     * @param integer $offset
     * @param integer $chunkSize
     * @param string $columnName
     * @param string $columnSortOrder
     * @param string $type
     * @return array for data array
     */
    public function getSystemLinkData($offset, $chunkSize, $columnName, $columnSortOrder, $type = '')
    {
        if ($type == config('constants.get_type_count')) {
            $systemLinkData = SystemLinks::select('count(*) as allcount');
            $systemLinkData->where('is_deleted', config('constants.active'));
            return $systemLinkData->count();
        } else {
            $systemLinkData = SystemLinks::orderBy($columnName, $columnSortOrder);
            $systemLinkData->where('is_deleted', config('constants.active'));
            return $systemLinkData->skip($offset)->take($chunkSize)->get();
        }


    }
    /**
     * To insert and update data
     * @return integer
     */
    public function saveRecords($request)
    {
        try {
            $id = $request->get('system_id');
            $systemLinks = $id ? SystemLinks::where('system_id', $id)->first() : new SystemLinks;
            $systemLinks->category_id = $request->input('category');
            $systemLinks->sort = $request->input('sort');
            $systemLinks->ja_system_name = $request->input('ja_system_name');
            $systemLinks->en_system_name = $request->input('en_system_name');
            $systemLinks->ja_url = $request->input('ja_url');
            $systemLinks->en_url = $request->input('en_url');
            $systemLinks->save();
            return $systemLinks->system_id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return integer
     */

    public function deleteRecords($request)
    {
        $systemLink = self::find($request->id);
        $systemLink->is_deleted = !$systemLink->is_deleted;
        $systemLink->save();
        return $systemLink;
    }

    public function systemNameExists($request)
    {
        $systemId = $request->get('system_id');
        $categoryId = $request->get('category');
        
        if($request->get('ja_system_name')){
            $systemName = $request->get('ja_system_name');
            $systemField='ja_system_name';
        }
        if($request->get('en_system_name')){
            $systemName = $request->get('en_system_name');
            $systemField='en_system_name';
        }

        if ($systemId) {
            return SystemLinks::where($systemField, $systemName)
            ->where('category_id', $categoryId)
            ->where('system_id', '!=', $systemId)
            ->first();
        } else {
            return SystemLinks::where($systemField, $systemName)
            ->where('category_id', $categoryId)
            ->first();
        }
    }
}