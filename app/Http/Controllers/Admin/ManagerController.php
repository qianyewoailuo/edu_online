<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;

class ManagerController extends Controller
{
    //管理员首页列表
    public function index()
    {
        // 原始数据直接获取
        // $data = Manager::get();
        // 使用分页获取数据
        $data = Manager::paginate(15);
        // laravel传递模板数据的方法是view(模板路由,数据)
        return view('admin/manager/index',compact('data'));
    }
}
