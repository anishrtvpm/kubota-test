<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }
    public function index()
    {
        $annoucement = $this->user->getUserGroupAnnouncement();
        return view('user.dashboard.index')->with([
            'annoucement' => $annoucement
        ]);
    }

}