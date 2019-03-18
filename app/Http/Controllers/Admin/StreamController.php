<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Stream;

class StreamController extends Controller
{
    // 直播流列表
    public function index()
    {
        $data = Stream::get();
        return view('admin/stream/index',compact('data'));
    }
    // 直播流添加
    public function add(Request $request)
    {
        if($request->method() == 'POST'){
            $data = $request->except('_token');
            $data['permited_at'] = strtotime($data['permited_at']);
            // var_dump($data);exit;
            return Stream::insert($data)?'1':'0';
        }else{
            return view('admin/stream/add');
        }
    }
}
