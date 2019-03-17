<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;

class QuestionController extends Controller
{
    // 试题列表展示
    public function index()
    {
        $data = Question::get();
        return view('admin/question/index',compact('data'));
    }
    // 显示答题选项
    public function showoptions(Request $request){
        $id = $request->input('id');
        $data = Question::where('id',$id)->value('options');
        $data = explode('~',$data);
        foreach($data as $val){
            echo '<br>';
            echo $val.'<br>';
        }
    }
}
