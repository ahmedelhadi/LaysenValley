<?php

use Illuminate\Support\Facades\Route;

// Login
use App\Http\Controllers\Auth\LoginController;

//Front
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LanguageController;

// Dashboard
use App\Http\Controllers\Dashboard\DashboardController;


// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\inquiryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\InquiryController as ControllersInquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('lang/{lang}', [LanguageController::class,'switchLang','as'=>'lang.switch'])->name('lang.switch');
Route::get('/pages/{slug}', [FrontController::class, 'pageShow'])->name('pageShow');
Route::get('/order-request', [FrontController::class, 'OrderRequest'])->name('OrderRequest');
Route::resource('gellary', App\Http\Controllers\GalleryController::class)->only([ 'index']);

Auth::routes();


Route::group(['as' => 'dashboard.'], function () {
    Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
        Route::post('/profile/update', [DashboardController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/profile/setting', [DashboardController::class, 'setting'])->name('profile.setting');



        Route::resource('/notifications', App\Http\Controllers\Dashboard\NotificationController::class);


    });
});

Route::group(['as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth', 'permissionHandler'], 'prefix' => 'admin'], function () {


        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile.index');
        
        Route::resource('/partners', PartnerController::class);
        Route::delete('partners/forceDelete/{id}', [PartnerController::class, 'forceDelete'])->name('partners.forceDelete');
        Route::post('partners/restore/{id}', [PartnerController::class, 'restore'])->name('partners.restore');

        Route::resource('/pages', PageController::class);
        Route::delete('pages/forceDelete/{id}', [PageController::class, 'forceDelete'])->name('pages.forceDelete');
        Route::post('pages/restore/{id}', [PageController::class, 'restore'])->name('pages.restore');

        Route::resource('/blocks', BlockController::class);
        Route::delete('blocks/forceDelete/{id}', [BlockController::class, 'forceDelete'])->name('blocks.forceDelete');
        Route::post('blocks/restore/{id}', [BlockController::class, 'restore'])->name('blocks.restore');

        Route::resource('/attributes', AttributeController::class);
        Route::delete('attributes/forceDelete/{id}', [AttributeController::class, 'forceDelete'])->name('attributes.forceDelete');
        Route::post('attributes/restore/{id}', [AttributeController::class, 'restore'])->name('attributes.restore');

        Route::resource('/galleries', GalleryController::class);
        Route::delete('galleries/forceDelete/{id}', [GalleryController::class, 'forceDelete'])->name('galleries.forceDelete');
        Route::post('galleries/restore/{id}', [GalleryController::class, 'restore'])->name('galleries.restore');

        Route::resource('/galleryitems', GalleryItemController::class);
        Route::delete('galleryitems/forceDelete/{id}', [GalleryItemController::class, 'forceDelete'])->name('galleryitems.forceDelete');
        Route::post('galleryitems/restore/{id}', [GalleryItemController::class, 'restore'])->name('galleryitems.restore');

        Route::resource('/orders', OrderController::class);
        Route::delete('orders/forceDelete/{id}', [OrderController::class, 'forceDelete'])->name('orders.forceDelete');
        Route::post('orders/restore/{id}', [OrderController::class, 'restore'])->name('orders.restore');



        Route::resource('statuses', StatusController::class);
        Route::delete('statuses/forceDelete/{id}', [StatusController::class, 'forceDelete'])->name('statuses.forceDelete');
        Route::post('statuses/restore/{id}', [StatusController::class, 'restore'])->name('statuses.restore');


        Route::resource('users', UserController::class);
        Route::delete('users/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('users.forceDelete');
        Route::post('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');

        Route::resource('inquiries', InquiryController::class);
        Route::delete('inquiries/forceDelete/{id}', [InquiryController::class, 'forceDelete'])->name('inquiries.forceDelete');
        Route::post('inquiries/restore/{id}', [InquiryController::class, 'restore'])->name('inquiries.restore');

        Route::resource('features', FeatureController::class);
        Route::delete('features/forceDelete/{id}', [FeatureController::class, 'forceDelete'])->name('features.forceDelete');
        Route::post('features/restore/{id}', [FeatureController::class, 'restore'])->name('features.restore');






        Route::resource('/roles', RoleController::class);
        Route::post('roles/massive-update', [RoleController::class, 'massiveUpdate'])->name('roles.massiveUpdate');
        Route::get('/updatePermissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');



        Route::resource('/reports', ReportController::class);
        Route::resource('/settings', SettingController::class);
        Route::resource('/notifications', NotificationController::class);
        

    });

});

