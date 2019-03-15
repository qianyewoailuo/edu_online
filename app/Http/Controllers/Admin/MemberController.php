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
}
