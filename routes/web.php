<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::group(['middleware' => ['auth', 'web', 'is_admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/faq_edit', function () {
        return view('admin.faq_edit');
    })->name('faq_edit');

    Route::get('/enquiry_view', function () {
        return view('admin.enquiry_view');
    })->name('enquiry_view');

    Route::get('/announcement_edit', function () {
        return view('admin.announcement_edit');
    })->name('announcement_edit');

    Route::get('/notice_edit', function () {
        return view('admin.notice_edit');
    })->name('notice_edit');

    Route::get('/user_info', function () {
        return view('admin.user_info');
    })->name('user_info');

    Route::get('/enquiry_management', function () {
        return view('admin.enquiry_management');
    })->name('enquiry_management');

});

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
    
    Route::get('/faq_list', function () {
        return view('user.faq_list');
    })->name('faq_list');

    Route::get('/faq_view', function () {
        return view('user.faq_view');
    })->name('faq_view');

    Route::get('/faq_create', function () {
        return view('user.faq_create');
    })->name('faq_create');

    Route::get('/notice_list', function () {
        return view('user.notice_list');
    })->name('notice_list');

    Route::get('/link_list', function () {
        return view('user.link_list');
    })->name('link_list');

    Route::get('/document_list', function () {
        return view('user.document_list');
    })->name('document_list');
});

require __DIR__ . '/auth.php';