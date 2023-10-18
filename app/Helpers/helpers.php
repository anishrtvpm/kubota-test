<?php

use App\Models\Employee;
use App\Models\IndSalesCorps;
use App\Models\IndSalesCorpsUsers;
use App\Models\UserGroups;
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
        $language = app()->getLocale();
        $isAdmin = authUser()->is_admin;
        if ($isAdmin) {
            $language = config('constants.language_japanese');
        }
        if (!$groupId) {
            return false;
        }
        $sysCategoryName = $language . "_category_name";
        $sysName = $language . "_system_name";
        $url = $language . "_url";

        $results = DB::table('user_groups_perms as ugp')
            ->select(
                'ugp.system_category as category_id',
                'slc.' . $sysCategoryName,
                'sl.sort',
                'sl.system_id',
                'sl.' . $sysName,
                'sl.' . $url,
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
            $categoryName = $result->$sysCategoryName;
            $sort = $result->sort;
            $systemId = $result->system_id;
            $systemName = $result->$sysName;
            $systemUrl = $result->$url;

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

        $isAdmin = authUser()->is_admin;
        $choice = trans('choice');
        $sysLink = trans('system_links');
        if ($isAdmin) {
            $choice = "選択";
            $sysLink = "システムリンク";
        }

        $navigation = array(
            route('admin_notice_list') => $isAdmin ? "お知らせ" : trans('notice'),
            route('faq.list') => "FAQ",
            route('faq_category_list') => $isAdmin ? "各種リンク" : trans('various_link'),
            route('link_template_category_list') => $isAdmin ? "テンプレート・フォーマット" : trans('application_format_template'),
            route('link_template_list') => $isAdmin ? "基幹システム(文書管理)" : trans('core_system_doc_management'),
        );

        $groupId = getUser(authUser()->guid)['group_id'];
        $links = getSystemLink($groupId);

        $str = "<select id='quick_navigation' class='form-select'>";
        $str .= "<option value='#'>" . $choice . "</option>";
        $str .= "<option disabled>" . $sysLink . "</option>";
        foreach ($links as $link) {
            $str .= "<optgroup style='font-weight :bold' label=" . $link['category_name'] . " >";

            foreach ($link['links'] as $systemlink) {
                $str .= '<option value="' . $systemlink['system_url'] . '" data-open="newTab">' . $systemlink['system_name'] . '</option>';
            }
            $str .= "</optgroup>";
        }

        foreach ($navigation as $key => $val) {
            $str .= '<option value="' . $key . '" data-open="currentTab">' . $val . '</option>';
        }
        $str .= "</select>";
        return $str;
    }
}


/**
 * Fetch active user groups
 * @return array
 */
function getActiveUserGroups()
{
    return UserGroups::select('group_id', 'group_ja_name', 'group_en_name')
        ->orderBy('group_id', 'asc')
        ->where('is_deleted', config('constants.active'))
        ->get();
}

/** Get the language string.
 * @param integer $langCode
 * @return string
 */

if (!function_exists('getLanguageString')) {
    function getLanguageString($langCode)
    {
        if ($langCode == 'en') {
            return "英語";
        } elseif ($langCode == 'ja') {
            return "日本語";
        }
    }
}

/**
 * Format date
 */
function dateFormat($date, $format)
{
    return $date ? \Carbon\Carbon::parse($date)->format($format) : "";
}

/**
 * Format text
 */
function textFormat($input)
{
    return strlen($input) > config('constants.text_display_max_length') ?
        mb_substr($input, 0, config('constants.text_display_max_length')) . '..' : $input;
}