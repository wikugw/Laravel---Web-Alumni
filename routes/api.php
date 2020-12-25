<?php

use App\Http\Controllers\APIController;
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

Route::get('/cerita', 'APIController@cerita');
Route::get('/cerita/popular-sort', 'APIController@ceritaPalingPopuler');
Route::get('/cerita/{id}', 'APIController@BacaCerita');
Route::post('/cerita/{id}', 'APIController@SubmitComment');
Route::get('/cerita/{id}/happy-reaction', 'APIController@HappyReaction');
Route::get('/cerita/{id}/sad-reaction', 'APIController@SadReaction');
Route::get('/alumni', 'APIController@alumni');
Route::get('/alumni/{id}', 'APIController@DetailAlumni');
