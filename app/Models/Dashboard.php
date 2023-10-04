<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function getSystemLinkData()
    {
        $lang = app()->getLocale();
        $categoryField = $lang . '_category_name';
        $itemField = $lang . '_system_name';
        $urlField = $lang . '_url';
        $systemLinks = SystemLinks::join('system_links_categories', 'system_links_categories.category_id', '=', 'system_links.category_id')
            ->select('system_links.' . $itemField . ' as system_name', 'system_links.' . $urlField . ' as url', 'system_links_categories.' . $categoryField)
            ->orderByRaw('system_links.sort ASC')
            ->get();
        $groupedItems = [];

        foreach ($systemLinks as $item) {
            $categoryId = $item[$categoryField];
            if (!isset($groupedItems[$categoryId])) {
                $groupedItems[$categoryId] = [];
            }
            $groupedItems[$categoryId][] = $item;
        }
        return $groupedItems;
    }
}