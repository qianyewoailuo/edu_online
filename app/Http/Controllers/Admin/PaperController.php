<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Paper;

class PaperController extends Controller
{
    // 试卷列表展示
    public function index()
    {
        $data = Paper::get();
        return view('admin/paper/index',compact('data'));    
    }
    // 试卷的导入与导出 使用2.1.0版本因为高版本问题很多
    // 依赖安装 >>> composer require "maatwebsite/excel:~2.1.0"
}
