<?php

namespace App\Http\Controllers\User;

use App\Models\Employee;
use App\Models\IndSalesCorpsUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function edit(Request $request)
    {
        $locale = $request->input('locale');
        if ($locale) {
            App::setLocale($locale);
            session()->put('locale', $locale);
            if (getCurrentGuard() == config('constants.kubota_user')) {
                Employee::where('guid', authUser()->guid)->update(['language' => $locale]);
            } else {
                IndSalesCorpsUsers::where('guid', authUser()->guid)->update(['language' => $locale]);
            }
        }
        return true;
    }
}