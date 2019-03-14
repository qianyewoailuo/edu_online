<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Input类
use Illuminate\Support\Facades\Input;
// 引入关系模型
use App\Admin\Auth;

class AuthController extends Controller
{
    //权限管理首页列表方法
    public function index()
    {
        return view('admin/auth/index');
    }
    //权限管理添加方法
    public function add(Request $request)
    {
        // 这里判断也可以使用Input::method()
        if($request->method() == 'POST'){
            // 这里暂时省略validate自动验证,可之后添加
            // 获取请求提交的数据,使用except()除外函数去除_token值(Input门面方法一样)
            // 额外的Input和$request的方法除了获取单用户get() | input() 不同以外其他都一样 
            $data = $request->except('_token');
            // 接受请求数据并写入数据表,返回true|false
            $result = Auth::insert($data);
            // 注意laravel框架不能返回bool值要转换成1|0
            return $result ? '1' : '0'; 
        }else{
            // 获取父级权限
            $parents = Auth::where('pid','=','0')->get();
            return view('admin/auth/add',compact('parents'));
        }
    }
}
