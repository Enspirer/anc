<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\OrderController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('package', [PackageController::class, 'index'])->name('package.index');
Route::get('package/create', [PackageController::class, 'create'])->name('package.create');
Route::post('package/store', [PackageController::class, 'store'])->name('package.store');
Route::get('package/getdetails', [PackageController::class, 'getdetails'])->name('package.getdetails');
Route::get('package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
Route::post('package/update', [PackageController::class, 'update'])->name('package.update');
Route::get('package/delete/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

Route::get('order', [OrderController::class, 'index'])->name('order.index');
Route::get('order/getdetails', [OrderController::class, 'getdetails'])->name('order.getdetails');
Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
Route::post('order/update', [OrderController::class, 'update'])->name('order.update');
Route::get('order/print/{id}', [OrderController::class, 'print'])->name('print');
Route::get('order/delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

Route::get('file_manager', [FileManagerController::class, 'index'])->name('file_manager.index');
Route::get('file_manager/getdetails', [FileManagerController::class, 'getdetails'])->name('file_manager.getdetails');
Route::get('file_manager/delete/{id}', [FileManagerController::class, 'destroy'])->name('file_manager.destroy');


Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('settings/update', [SettingsController::class, 'settings_update'])->name('settings_update');

Route::get('about_us', [SettingsController::class, 'about_us'])->name('about_us');
Route::post('about_us/update', [SettingsController::class, 'about_us_update'])->name('about_us_update');

Route::get('privacy_policy', [SettingsController::class, 'privacy_policy'])->name('privacy_policy');
Route::post('privacy_policy/update', [SettingsController::class, 'privacy_policy_update'])->name('privacy_policy_update');

Route::get('terms_and_conditions', [SettingsController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::post('terms_and_conditions_update/update', [SettingsController::class, 'terms_and_conditions_update'])->name('terms_and_conditions_update');

Route::get('contactus_thanks', [SettingsController::class, 'contactus_thanks'])->name('contactus_thanks');
Route::post('contactus_thanks_update/update', [SettingsController::class, 'contactus_thanks_update'])->name('contactus_thanks_update');


