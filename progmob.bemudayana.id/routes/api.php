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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('update-profile/{id}', 'AuthController@updateProfile');
Route::post('fcm-token', 'FCMController@store');

Route::post('kegiatan/store', 'KegiatanController@store');
Route::get('kegiatan', 'KegiatanController@index');
Route::post('kegiatan/update/{id}', 'KegiatanController@updateKegiatan');
Route::get('kegiatan/get-data-user/{id}', 'KegiatanController@getDataKegiatanUser');
Route::get('kegiatan/delete/{id}', 'KegiatanController@delete');
