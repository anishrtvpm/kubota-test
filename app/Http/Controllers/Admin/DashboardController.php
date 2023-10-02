<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dashboard;
use App\Http\Controllers\Controller;

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
        $annoucement = $this->dashboard->getUserGroupAnnouncement();
        return view('admin.dashboard.index')->with([
            'annoucement' => $annoucement
        ]);
    }

}