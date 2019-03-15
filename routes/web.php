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
// 使用中间件middleware其参数必须指定自定义的guard,即auth:guard name
Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkrbac']],function(){
    // 后台首页路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');
    // 管理员列表首页路由 - laravel框架分页
    Route::get('manager/index','Admin\ManagerController@index');
    // 管理员列表首页路由 - datatables无刷新分页
    Route::get('manager/showlist','Admin\ManagerController@showlist');
    // 权限列表与权限添加路由
    Route::get('auth/index','Admin\AuthController@index');
    Route::any('auth/add','Admin\AuthController@add');

    // 角色列表与角色分配权限路由
    Route::get('role/index','Admin\RoleController@index');
    Route::any('role/assign','Admin\RoleController@assign');

    // 会员相关路由
    Route::get('member/index','Admin\MemberController@index');
    Route::any('member/showmember','Admin\MemberController@showmember');
    Route::any('member/add','Admin\MemberController@add');
    Route::post('upload/webuploader','Admin\UploadController@webuploader');
    Route::get('member/getareabyid','Admin\MemberController@getareabyid');

});