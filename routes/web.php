<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductRangeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('privatelable', [HomeController::class, 'privatelable'])->name('privatelable');
Route::get('manufacture', [HomeController::class, 'manufacture'])->name('manufacture');
Route::get('careers', [HomeController::class, 'careers'])->name('careers');
Route::get('contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('ourbrands', [HomeController::class, 'ourbrands'])->name('ourbrands');
Route::get('partnership', [HomeController::class, 'partnership'])->name('partnership');

// Product Range
Route::get('shilajitmanufacturing', [ProductRangeController::class, 'shilajitmanufacturing'])->name('shilajitmanufacturing');
Route::get('supplimentmanufacturing', [ProductRangeController::class, 'supplimentmanufacturing'])->name('supplimentmanufacturing');
Route::get('herbalmanufacturing', [ProductRangeController::class, 'herbalmanufacturing'])->name('herbalmanufacturing');
Route::get('spicesmanufacturing', [ProductRangeController::class, 'spicesmanufacturing'])->name('spicesmanufacturing');
Route::get('driedfood', [ProductRangeController::class, 'driedfood'])->name('driedfood');
Route::get('honeyproduts', [ProductRangeController::class, 'honeyproduts'])->name('honeyproduts');
Route::get('tea', [ProductRangeController::class, 'tea'])->name('tea');
Route::get('honeymanufacturing', [ProductRangeController::class, 'honeymanufacturing'])->name('honeymanufacturing');

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Dashboard (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | Profile (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Super Admin Only — Manage Admins/Super Admins
    |--------------------------------------------------------------------------
    */
    Route::middleware(['super_admin'])->group(function () {
        Route::resource('/admin/dashboard/users', AdminUsersController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin + Super Admin — Shared Dashboard Resources
    |--------------------------------------------------------------------------
    */

    Route::middleware(['admin_role'])->group(function () {

        // homepage
        Route::resource('homehero', App\Http\Controllers\Admin\HomeHeroController::class);
        Route::resource('homeproductrange', App\Http\Controllers\Admin\HomeProductRangeController::class);
        Route::resource('productdesc', App\Http\Controllers\Admin\ProductDescController::class);
        Route::resource('productcategories', App\Http\Controllers\Admin\ProductCategoriesController::class);
        Route::resource('services', App\Http\Controllers\Admin\ServicesController::class);
        Route::resource('process_steps', App\Http\Controllers\Admin\ProcessStepController::class);
        Route::resource('formulations', \App\Http\Controllers\Admin\FormulationController::class);
        Route::resource('stats', \App\Http\Controllers\Admin\StatController::class);
        Route::resource('faq', \App\Http\Controllers\Admin\FAQController::class);
        Route::resource('faq_banners', \App\Http\Controllers\Admin\FAQBannerController::class);
        Route::resource('whoweare', App\Http\Controllers\Admin\WhoweareController::class);

        // aboutus page
        Route::resource('visionmission', App\Http\Controllers\Admin\VisionMissionController::class);
        Route::resource('corevalues', App\Http\Controllers\Admin\CorevalueController::class);
        Route::resource('manufacturing', App\Http\Controllers\Admin\ManufacturingController::class);

    });

});

require __DIR__.'/auth.php';
