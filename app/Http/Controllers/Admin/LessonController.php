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
    public function play(Request $request){
        $id = $request->input('id');
        $addr = Lesson::where('id',$id)->value('video_addr');
        return "<div><video src='$addr' style='margin: auto;position:absolute;top:0;left:0;bottom:0;right:0;' width='80%' controls='controls'>您的浏览器不支持 video 标签。</video></div>";

    }
}
