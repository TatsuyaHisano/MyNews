<?php
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
    return view('welcome');
});
// 「/admin」かつ、auth認証必要URLとして、グルーピング
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // 「/news」でグルーピング
    Route::group(['prefix' => 'news'], function() {
        // 「/admin/news」
        Route::get('', 'Admin\NewsController@index');
        // 「/admin/news/create」
        Route::get('create', 'Admin\NewsController@add');
        Route::post('create', 'Admin\NewsController@create');
        Route::get('edit', 'Admin\NewsController@edit');
        Route::post('edit', 'Admin\NewsController@update');
        Route::get('delete', 'Admin\NewsController@delete');
    });
    // 「/profile」でグルーピング
    Route::group(['prefix' => 'profile'], function() {
        Route::get('', 'Admin\ProfileController@index');
        Route::get('create', 'Admin\ProfileController@add'); # 課題追記
        Route::post('create', 'Admin\ProfileController@create'); # 課題追記
        Route::get('edit', 'Admin\ProfileController@edit'); // 追記
        Route::post('edit', 'Admin\ProfileController@update'); // 追記
        Route::get('delete', 'Admin\ProfileController@delete'); // 追記
    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');