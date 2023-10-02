<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Model
{
    use HasFactory;


    public function getUserGroupAnnouncement()
    {
        $userGroup = $this->getUserGroup();
        if (!$userGroup) {
            return false;
        }
        return $this->getAnnouncement($userGroup);
    }

    public function getAnnouncement($group_id)
    {
        $currentDate = now();
        $announcement = Announcement::where('group_id', $group_id)
            ->where('is_deleted', config('constants.active'))
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->first();
        if ($announcement) {
            return getAppLocale() == 'ja' ? $announcement->ja_message : $announcement->en_message;
        }
        return false;
    }

    public function getUserGroup()
    {
        $userType = Auth::user()->user_type;
        //If logged user type is independent user, then group 6 is directly assigned.
        if ($userType == config('constants.ind_user')) {
            return config('constants.ind_user_group_id');
        }

        $groupId = Organization::select('organization.group_id')
            ->join('employee', function ($join) {
                $join->on('organization.company_cd', '=', 'employee.company_cd')
                    ->on('organization.section_cd', '=', 'employee.section_cd')
                    ->on('organization.branch_no', '=', 'employee.branch_no')
                    ->where('employee.guid', '=', Auth::user()->employee_id);
            })
            ->value('group_id');

        return $groupId ?? false;

    }

    public function getSystemLinkData(){
        $systemLinks = SystemLinks::join('system_links_categories', 'system_links_categories.category_id', '=', 'system_links.category_id')
        ->select('system_links.*', 'system_links_categories.ja_category_name')
        ->orderByRaw('system_links.sort ASC')
        ->get();
        $groupedItems = [];

        foreach ($systemLinks as $item) {
            $categoryId = $item['ja_category_name'];
            if (!isset($groupedItems[$categoryId])) {
                $groupedItems[$categoryId] = [];
            }
            $groupedItems[$categoryId][] = $item;
        }
        return $groupedItems;
    }
}