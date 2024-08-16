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

//トップページの表示
Route::get('/', 'PostsController@index');

//新規登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//フォロー・フォロワー関連
Route::group(['prefix' => 'users/{id}'],function(){
    Route::get('followings','FollowController@followingsShow')->name('followings');
    Route::get('followers','FollowController@followersShow')->name('followers');
});

//ユーザー詳細、編集、更新、削除
Route::prefix('users')->group(function() {
    Route::get('{id}','UsersController@show')->name('users.show');
    Route::get('{id}/edit','UsersController@edit')->name('users.edit');
    Route::put('{id}','UsersController@update')->name('users.update');
    Route::delete('{id}','UsersController@destroy')->name('users.delete');
});

// ログイン後
Route::group(['middleware' => 'auth'], function () {
    // 投稿
    Route::prefix('posts')->group(function () {
        Route::post('', 'PostsController@store')->name('posts.store');
        Route::get('{id}/edit','PostsController@edit')->name('posts.edit');
        Route::put('{id}','PostsController@update')->name('posts.update');
        Route::delete('{id}', 'PostsController@destroy')->name('posts.delete');
    });
     // ログイン後フォロー機能
    Route::group(['prefix' => 'users/{id}'],function(){
        Route::post('follow','FollowController@store')->name('follow');
        Route::delete('unFollow','FollowController@destroy')->name('unFollow');
    });
});
