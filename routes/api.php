<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware'=>'auth:api'],function(){
    Route::get('get_subjects','Api\StudentController@index')->name('getSubjects');
    Route::post('save_user','Api\StudentController@store')->name('saveUsers');
    Route::get('get_user_data','Api\StudentController@show')->name('getUserData');
    Route::post('update_user','Api\StudentController@update')->name('updateUserData');
    Route::get('get_student_subjects','Api\StudentController@getsubjects')->name('getUserSubjects');
    Route::get('get_other_subjects','Api\StudentController@getOthersubjects')->name('getOtherSubjects');
    Route::post('subscribe_subject/{id}','Api\StudentController@subsribeSubject')->name('subscribeModule');
    Route::post('add_fav/{id}','Api\StudentController@adFavorite')->name('addFavSubject');    
// });

