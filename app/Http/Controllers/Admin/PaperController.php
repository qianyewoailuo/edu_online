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
}
