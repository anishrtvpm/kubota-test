<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    private $dashboard;

    public function __construct(Dashboard $dashboard)
    {
        $this->middleware('auth');
        $this->dashboard = $dashboard;
    }
    public function index()
    {
        $userInfo = getUser(Auth::user()->employee_id);
        $groupId=$userInfo ? $userInfo['group_id'] : null ;
        $annoucement = $this->dashboard->getUserGroupAnnouncement($groupId);
        $systemLinks=$this->dashboard->getSystemLinkData($groupId);

        return view('admin.dashboard.index')->with([
            'annoucement' => $annoucement,
            'systemLinks' => $systemLinks
        ]);
    }

}