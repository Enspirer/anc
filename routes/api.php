<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\CustomizeInquiryController;
use App\Http\Controllers\Frontend\PackageController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('package_latest', [PackageController::class, 'package_latest'])->name('package_latest');

Route::post('customize/customize_inquire', [CustomizeInquiryController::class, 'customize_inquire'])->name('customize.customize_inquire');
