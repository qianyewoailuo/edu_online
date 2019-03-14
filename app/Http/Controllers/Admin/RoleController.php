<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;

class RoleController extends Controller
{
    //角色展示首页方法
    public function index(){
        $data = Role::get();
        return view('admin/role/index',compact('data'));
    }
}
