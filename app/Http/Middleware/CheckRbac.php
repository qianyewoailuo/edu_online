<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// Route门面获取当前路由地址
use Illuminate\Support\Facades\Route;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 鉴权处理
        // 测试是否成功进入鉴权,例如是否显示phpinfo
        // phpinfo();exit;

        if(Auth::guard('admin')->user()->role_id != '1'){
            // 非超级管理员用户需进行鉴权
            // 获取当前路由地址>"App\Http\Controllers\Admin\IndexController@index"
            $action = Route::currentRouteAction();
            $actionArr = explode('\\',$action);
            // 使用end()函数可以将数组指针置于末尾并返回该元素值
            $action = strtolower(end($actionArr));
            // 获取当前管理员用户的权限
            $ac = Auth::guard('admin')->user()->role->auth_ac;
            // 加上特殊路由权限:首页index路由+welcome路由
            $ac .= ',indexcontroller@index,indexcontroller@welcome';
            // 判断字符串是否在数组中使用in_array() 或 strpos()判别字符串是否在其中 这里使用strpos()
            if(strpos($ac,$action) === false){
                echo '<h1>您没有权限访问</h1>';
                exit;
            }
        }
        // 鉴权通过继续下一步请求
        return $next($request);
    }
}
