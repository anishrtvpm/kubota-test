<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'employee_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function employee()
    {
        return $this->hasOne(Employee::class, 'guid', 'employee_id');
    }

    public function indUser()
    {
        return $this->hasOne(IndSalesCorpsUsers::class, 'guid', 'employee_id');
    }

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
        if ($userType == config('constants.ind_user')) {
            return config('constants.ind_user_group_id');
        }

        $employee = Employee::where('guid', Auth::user()->employee_id)->first();
        if ($employee) {
            $organization = Organization::select('group_id')
                ->where('company_cd', $employee->company_cd)
                ->where('section_cd', $employee->section_cd)
                ->where('branch_no', $employee->branch_no)
                ->first();
                return $organization ? $organization->group_id : false;

        }
        return false;
    }
}