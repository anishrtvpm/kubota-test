<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;

    /**
     * Fetch announcements
     * @return mixed
     */
    public function getUserGroupAnnouncement()
    {
        $announcements = null;
        $userInfo = getUser();
        $groupId = $userInfo ? $userInfo['group_id'] : null;
        if ($groupId) {
            $announcements = $this->getAnnouncement($groupId, app()->getLocale());
        }
        return $announcements;
    }
 

    /**
     * Get announcements based on user group and language
     * @param int $groupId
     * @param string $language
     * @return mixed
     */
    public function getAnnouncement($groupId, $language)
    {
        $today = now();
        $column = $language . '_message';

        $results = Announcement::select($column)
            ->where('group_id', $groupId)
            ->where('is_deleted', 0)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->first();

        if ($results) {
            return ($language == config('constants.language_japanese')) ? $results->ja_message : $results->en_message;
        }
        return false;
    }

    /**
     * Get system links based on user group and language
     *
     * @return mixed
     */
    public function getSystemLinkData($groupId)
    {
        $groupedItems = [];

        if ($groupId) {

            $lang = app()->getLocale();
            $categoryField = $lang . '_category_name';
            $itemField = $lang . '_system_name';
            $urlField = $lang . '_url';

            $systemLinks = DB::table('user_groups_perms as ugp')
                ->select(
                    'ugp.system_category as category_id',
                    'sl.' . $itemField . ' as system_name',
                    'sl.' . $urlField . ' as url',
                    'slc.' . $categoryField
                );
            $systemLinks->join('system_links as sl', 'ugp.system_id', '=', 'sl.system_id');
            $systemLinks->join('system_links_categories as slc', 'ugp.system_category', '=', 'slc.category_id');
            $systemLinks->where('ugp.group_id', $groupId);
            $systemLinks->where('ugp.is_visible', 1);
            $systemLinks->where('ugp.is_deleted', 0);
            $systemLinks->orderByRaw("ugp.system_category ASC, sl.sort ASC");

            $systemLinks = $systemLinks->get();

            foreach ($systemLinks as $item) {
                $categoryId = $item->$categoryField;
                if (!isset($groupedItems[$categoryId])) {
                    $groupedItems[$categoryId] = [];
                }
                $groupedItems[$categoryId][] = $item;
            }
        }
        return $groupedItems;
    }
}