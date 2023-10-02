<?php

use App\Models\Employee;
use App\Models\IndSalesCorps;
use App\Models\IndSalesCorpsUsers;
use Illuminate\Support\Facades\DB;

/* To get the logged user details */
if (!function_exists('getUser')) {
    function getUser($guid)
    {
        $today = now();
        if (strlen($guid) == config('constants.kubota_user_guid_length')) {

            $user = Employee::where('guid', $guid)
                ->where('primary_flg', config('constants.primary_user'))
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->first();
            if ($user) {
                $userArray = $user->attributesToArray();
                $userArray['isKubota'] = true;

                $org = DB::table('organization')
                    ->join('kubota_corps', 'organization.company_cd', '=', 'kubota_corps.company_cd')
                    ->where('organization.company_cd', $user['company_cd'])
                    ->where('organization.section_cd', $user['section_cd'])
                    ->where('organization.branch_no', $user['branch_no'])
                    ->select(
                        'organization.ja_name as ja_section_name',
                        'organization.en_name as en_section_name',
                        'group_id',
                        'kubota_corps.ja_name as ja_company_name',
                        'kubota_corps.en_name as en_company_name',
                    )->first();

                if ($org) {
                    $userArray['ja_section_name'] = $org->ja_section_name;
                    $userArray['en_section_name'] = $org->en_section_name;
                    $userArray['ja_company_name'] = $org->ja_company_name;
                    $userArray['en_company_name'] = $org->en_company_name;
                    $userArray['group_id'] = $org->group_id;
                    return $userArray;
                }
            }
            return false;

        } else {
            $user = IndSalesCorpsUsers::where('guid', $guid)
                ->where('is_deleted', config('constants.active'))
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->first();
            if ($user) {
                $userArray = $user->attributesToArray();
                $userArray['isKubota'] = false;

                $org = IndSalesCorps::where('company_id', $user->company_id)
                    ->where('is_deleted', config('constants.active'))
                    ->whereDate('start_date', '<=', $today)
                    ->whereDate('end_date', '>=', $today)
                    ->first();

                if ($org) {
                    $userArray['company_name'] = $org->company_name;
                    $userArray['group_id'] = config('constants.ind_user_group_id');
                    return $userArray;
                }
            }
            return false;
        }
    }
}