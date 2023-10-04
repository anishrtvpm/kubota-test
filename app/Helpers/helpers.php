<?php

use App\Models\Employee;
use App\Models\IndSalesCorps;
use App\Models\IndSalesCorpsUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Get user information based on guid.
 *
 * @param string $guid
 * @return array
 */
if (!function_exists('getUser')) {
    function getUser()
    {
        $guid = authUser()->guid;

        
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

                $organization = DB::table('organization')
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
                if ($organization) {
                    $userArray['ja_section_name'] = $organization->ja_section_name;
                    $userArray['en_section_name'] = $organization->en_section_name;
                    $userArray['ja_company_name'] = $organization->ja_company_name;
                    $userArray['en_company_name'] = $organization->en_company_name;
                    $userArray['group_id'] = $organization->group_id;
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

                $organization = IndSalesCorps::where('company_id', $user->company_id)
                    ->where('is_deleted', config('constants.active'))
                    ->whereDate('start_date', '<=', $today)
                    ->whereDate('end_date', '>=', $today)
                    ->first();

                if ($organization) {
                    $userArray['company_name'] = $organization->company_name;
                    $userArray['group_id'] = config('constants.ind_user_group_id');
                    return $userArray;
                }
            }
            return false;
        }
    }
}

/**
 * get logged-in user's type.
 *
 * @return string
 */
if (!function_exists('getCurrentGuard')) {
    function getCurrentGuard()
    {
        $guards = ['kubota', 'independent'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
    }
}
/**
 * check is-admin status based on guid.
 *
 * @return boolean
 */
if (!function_exists('checkIsAdmin')) {
    function checkIsAdmin()
    {
        if (isset(authUser()->is_admin) && authUser()->is_admin == config('constants.is_admin')) {
            return true;
        }
        return false;
    }
}

/**
 * get authUser data
 *
 * @return object
 */
if (!function_exists('authUser')) {
    function authUser()
    {
        return Auth::guard(getCurrentGuard())->user();
    }
}