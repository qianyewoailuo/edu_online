<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 首页展示的方法
    public function index(){
        // 直播课程列表
        $live = \App\Admin\live::orderBy('sort','desc')->where('status','1')->get();
        // 如果不想在模版中判断输出可以如下
        $profession = \App\Admin\Profession::orderBy('sort','desc')->get();
        // dd($profession);
        return view('home/index/index',compact('live','profession'));
    }
}
