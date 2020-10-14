<?php

use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.index');
})->name('start');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::resource('users', 'userController');
    Route::get('users/{id}/authenticate', 'userController@authenticate')->name('users.authenticate');
    Route::resource('userdetails', 'userDetailController');
});

Route::get('/alumni', 'HomeController@alumni')->name('alumni');
Route::get('alumni/{id}', 'HomeController@alumniDetail')->name('alumni.detail');
Route::get('/home', 'HomeController@index')->name('home');
