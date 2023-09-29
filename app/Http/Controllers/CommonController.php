<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonModal;

class CommonController extends Controller
{
    private $commonModal;
    public function __construct(CommonModal $commonModal)
    {
        $this->middleware('auth');
        $this->commonModal = $commonModal;
    }
    public function index(){
        $systemLinks=$this->commonModal->getSystemLinkData();
        return view('admin.dashboard')->with(['systemLinks' => $systemLinks]);
    }
}
