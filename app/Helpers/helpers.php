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
 * @return mixed
 */
if (!function_exists('getUser')) {
    function getUser($guid)
    {
        $today = now();
        $userArray = [];
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
                }
            }
            return $userArray;

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
                }
            }
            return $userArray;
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
/**
 * get system links
 *
 * @param integer $groupId
 * @return mixed
 */
if (!function_exists('getSystemLink')) {
    function getSystemLink($groupId)
    {
        if (!$groupId) {
            return false;
        }

        $results = DB::table('user_groups_perms as ugp')
            ->select(
                'ugp.system_category as category_id',
                'slc.ja_category_name',
                'slc.en_category_name',
                'sl.sort',
                'sl.system_id',
                'sl.ja_system_name',
                'sl.en_system_name',
                'sl.ja_url',
                'sl.en_url',
            )
            ->join('system_links as sl', 'ugp.system_id', '=', 'sl.system_id')
            ->join('system_links_categories as slc', 'ugp.system_category', '=', 'slc.category_id')
            ->where('ugp.group_id', $groupId)
            ->where('ugp.is_visible', 1)
            ->where('ugp.is_deleted', config('constants.active'))
            ->orderByRaw("ugp.system_category ASC, sl.sort ASC")
            ->get();

        $systemLinks = [];

        foreach ($results as $result) {
            $categoryId = $result->category_id;
            $categoryName = $result->ja_category_name;
            $sort = $result->sort;
            $systemId = $result->system_id;
            $systemName = $result->ja_system_name;
            $systemUrl = $result->ja_url;

            // カテゴリがまだ存在しない場合、初期化
            if (!isset($systemLinks[$categoryId])) {
                $systemLinks[$categoryId] = [
                    'category_name' => $categoryName,
                    'links' => [],
                ];
            }

            // リンクを追加
            $systemLinks[$categoryId]['links'][] = [
                'system_id' => $systemId,
                'sort' => $sort,
                'system_name' => $systemName,
                'system_url' => $systemUrl,
            ];
        }
        return $systemLinks;
    }
}

/**
 * Get the quick navigation at the top.
 *
 * @param integer $groupId
 * @return mixed
 */

if (!function_exists('getQuickNavigation')) {
    function getQuickNavigation()
    {

       $navigation = array(
            route('admin_notice_list') => "お知らせ",
            route('faq_article_list') => "FAQ",
            route('faq_category_list') => "各種リンク",
            route('link_template_category_list') => "テンプレート・フォーマット",
            route('link_template_list') => "基幹システム(文書管理)"
        );
       
        $groupId = getUser(authUser()->guid)['group_id'];
        $links = getSystemLink($groupId);

        $str = "<select id='quick_navigation' class='form-select'>";
        $str .= "<option value='#'>選択</option>";
        $str .= "<option disabled>システムリンク</option>";
        foreach ($links as $link) {
            $str .= "<optgroup style='font-weight :bold' label=".$link['category_name']." >";

            foreach ($link['links'] as $systemlink) {
                $str .= '<option value="' . $systemlink['system_url'] . '" data-open="newTab">' . $systemlink['system_name'] . '</option>';
            }
            $str .="</optgroup>";
        }
        
        foreach ($navigation as $key => $val) {
            $str .= '<option value="' . $key . '" data-open="currentTab">' . $val . '</option>';
        }
        $str .= "</select>";
        return $str;
    }
}


function dateFormat($date, $format)
{
    return $date ? \Carbon\Carbon::parse($date)->format($format) : "";
}

function textFormat($input)
{
    return strlen($input) > config('constants.text_display_max_length') ?
        mb_substr($input, 0, config('constants.text_display_max_length')) . '..' : $input;
}