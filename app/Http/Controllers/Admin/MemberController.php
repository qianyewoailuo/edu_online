<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Admin\Member;
// 会员控制器
class MemberController extends Controller
{
    //会员列表方法
    public function index(){
        $data = Member::get();
        return view('admin/member/index',compact('data'));
    }
    //会员资料展示方法
    public function showmember(Request $request){
        $id = $request->input('id');
        $data = Member::where('id','=',$id)->first();
        return view('admin/member/showmember',compact('data'));
    }
}
