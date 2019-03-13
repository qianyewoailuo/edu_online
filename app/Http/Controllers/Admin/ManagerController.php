<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;

class ManagerController extends Controller
{
    //管理员首页列表 - laravel框架分页
    public function index()
    {
        // 原始数据直接获取
        // $data = Manager::get();
        // 使用laravel框架分页获取数据
        $data = Manager::paginate(15);
        // laravel传递模板数据的方法是view(模板路由,数据)
        return view('admin/manager/index',compact('data'));
    }
    // 管理员首页列表 - datatables无刷新分页
    public function showlist(){
        // 获取数据
        $data = Manager::get();
        // 获取数据记录总数
        $count = Manager::count();
        return view('admin/manager/showlist',compact('data','count'));
    }
}
