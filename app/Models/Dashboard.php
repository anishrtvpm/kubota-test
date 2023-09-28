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
        $announcement = $this->getAnnouncement($userGroup);
        if ($announcement) {
            return getAppLocale() == 'ja' ? $announcement->ja_message : $announcement->en_message;
        }
        return false;
    }

    public function getAnnouncement($group_id)
    {
        $currentDate = now();
        return Announcement::where('group_id', $group_id)
            ->where('is_deleted', config('constants.active'))
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->first();
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
}