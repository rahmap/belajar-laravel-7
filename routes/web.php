<?php

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin-home');
    Route::get('/admin/list-user', 'AdminController@listUser')->name('list-user');
});

Route::group(['middleware' => 'member_auth'], function () {
    Route::get('/member', 'MemberController@index')->name('member-home');
});



Auth::routes();

