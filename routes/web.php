<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SystemLinksController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

    Route::get('/admin_dashboard', [CommonController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin_dashboard');

    Route::get('/system_link', [SystemLinksController::class, 'index'])->name('system_link.list');
    Route::post('/system_link/get', [SystemLinksController::class, 'get'])->name('system_link.get');
    Route::post('/system_link/edit', [SystemLinksController::class, 'edit'])->name('system_link.edit');
    Route::post('/system_link/store', [SystemLinksController::class, 'store'])->name('system_link.store');
    Route::delete('/system_link/delete', [SystemLinksController::class, 'delete'])->name('system_link.delete');

    Route::get('/faq/categories', [FaqController::class, 'categories'])->name('faq_category.list');
    Route::post('/faq/get_all_categories', [FaqController::class, 'getAllCategories'])->name('system_link.get');

    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    
    Route::get('/faq_edit', function () {
        return view('admin.faq_edit');
    })->name('faq_edit');

    Route::get('/announcement_edit', function () {
        return view('admin.announcement_edit');
    })->name('announcement_edit');

    Route::get('/notice_edit', function () {
        return view('admin.notice_edit');
    })->name('notice_edit');

    Route::get('/user_info', function () {
        return view('admin.user_info');
    })->name('user_info');

    Route::get('/user_independant', function () {
        return view('admin.user_independant');
    })->name('user_independant');

    Route::get('/enquiry_management', function () {
        return view('admin.enquiry_management');
    })->name('enquiry_management');
   
   

    Route::get('/faq_category_list', function () {
        return view('admin.faq_category_list');
    })->name('faq_category_list');

    Route::get('/contact_information_edit', function () {
        return view('admin.contact_information_edit');
    })->name('contact_information_edit');

    Route::get('/link_template_list', function () {
        return view('admin.link_template_list');
    })->name('link_template_list');

    Route::get('/link_template_category_list', function () {
        return view('admin.link_template_category_list');
    })->name('link_template_category_list');

    Route::get('/template_edit', function () {
        return view('admin.template_edit');
    })->name('template_edit');

    Route::get('/admin_notice_list', function () {
        return view('admin.admin_notice_list');
    })->name('admin_notice_list');

    Route::get('/faq_article_list', function () {
        return view('admin.faq_article_list');
    })->name('faq_article_list');

    Route::get('/independent_company_list', function () {
        return view('admin.independent_company_list');
    })->name('independent_company_list');

    Route::get('/edit_link', function () {
        return view('admin.edit_link');
    })->name('edit_link');

    Route::get('/independent_company_permission_settings', function () {
        return view('admin.independent_company_permission_settings');
    })->name('independent_company_permission_settings');

    Route::get('/affiliation_information_list', function () {
        return view('admin.affiliation_information_list');
    })->name('affiliation_information_list');
    Route::get('/user_permission_list', function () {
        return view('admin.user_permission');
    })->name('user_permission_list');

    Route::get('/user_permission_add', function () {
        return view('admin.user_permission_add');
    })->name('user_permission_add');

    Route::get('/user_permission_independent', function () {
        return view('admin.user_permission_independent');
    })->name('user_permission_independent');

});

Route::group(['middleware' => ['auth', 'web']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
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

    Route::get('/document_view', function () {
        return view('user.document_view');
    })->name('document_view');
    
    Route::get('/faq_confirm', function () {
        return view('user.faq_confirm');
    })->name('faq_confirm');
});

require __DIR__ . '/auth.php';