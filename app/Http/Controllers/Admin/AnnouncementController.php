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
        $userGroup = getActiveUserGroups();
        $announcements = $this->announcement->getAnnouncements();

        return view('admin.announcements.create')->with([
            'userGroups' => $userGroup,
            'announcements' => $announcements,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $this->announcement->validateInputData($request);
        if ($validateData['error']) {
            return Redirect::back()->with('error', $validateData['message']);
        }

        if (!$this->announcement->saveRecords($request)) {
            return Redirect::back()->with('error', 'アナウンス作成にエラーが発生しました。');
        }
        return Redirect::back()->with('message', 'アナウンス登録しました。');
    }
}
