<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

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

// Route::middleware('auth:sanctum')->get('/', function (Request $request) {
//     return $request->user();
// });

// Route::get('/sign-in', function () {
//     return view('auth.signin');
// });
// Route::get('/sign-up', function () {
//     return view('auth.signup');
// });
// Route::get('/', function () {
//     return view('home');
// });



// Route::get('/register', 'Auth\AuthController@register')->name('register');
// Route::post('/register', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
// Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// Route::get('/home', 'Auth\AuthController@home')->name('home');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
