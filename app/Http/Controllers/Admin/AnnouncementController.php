<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    private $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->middleware('auth');
        $this->announcement = $announcement;
    }

    public function create()
    {
        $userGroup = $this->announcement->getActiveUserGroups();
        $announcements = $this->announcement->getAnnouncements();

        return view('admin.announcements.create')->with([
            'userGroups' => $userGroup,
            'announcements' => $announcements,
        ]);
    }

    public function store(Request $request)
    {
        if (!$this->announcement->saveRecords($request)) {
            return Redirect::back()->with('error', trans('announcement_create_error'));
        }
        return Redirect::back()->with('message', trans('announcement_create_success'));
    }
}