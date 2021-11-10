<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\CustomizeInquiryController;


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



Route::get('package_details/{id}/{name}', 'Frontend\HomeController@package_details');

Route::post('customize/customize_inquire', [CustomizeInquiryController::class, 'customize_inquire'])->name('customize.customize_inquire');
