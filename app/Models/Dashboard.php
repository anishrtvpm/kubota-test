<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Model
{
    use HasFactory;

    public function getUserGroupAnnouncement()
    {
        $userInfo = getUser(Auth::user()->employee_id);
        $groupId = $userInfo ? $userInfo['group_id'] : null;
        if (!$groupId) {
            return Redirect::back()->with('error', __('invalid_user_error'));
        }
        return $this->getAnnouncement($groupId, app()->getLocale());
    }

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
}