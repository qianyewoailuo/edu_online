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
// 默认首页路由
Route::get('/', function () {
    return view('welcome');
});

// 后台路由组-非权限
Route::group(['prefix' => 'admin'],function(){
    // 后台登录页面
    Route::get('public/login','Admin\PublicController@login')->name('login');
    // 用户退出
    Route::get('public/logout','Admin\PublicController@logout');
    // 登录验证页面
    Route::post('public/check','Admin\PublicController@check')->name('check');
});
// 后台路由组-权限
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    // 后台首页路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');
    // test 路由
    Route::get('index/test','Admin\IndexController@test');
});