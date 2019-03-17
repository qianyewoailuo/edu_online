<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lesson;

class LessonController extends Controller
{
    //点播列表
    public function index(){
        $data = Lesson::orderBy('sort','desc')->get();
        return view('admin/lesson/index',compact('data'));
    }
    // 点播视频展示
    public function play(){
        return 'hello world';
    }
}
