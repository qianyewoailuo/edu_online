<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Admin\Member;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// 会员控制器
class MemberController extends Controller
{
    // 会员列表方法
    public function index(){
        $data = Member::get();
        return view('admin/member/index',compact('data'));
    }
    // 会员资料展示方法
    public function showmember(Request $request){
        $id = $request->input('id');
        $data = Member::where('id','=',$id)->first();
        return view('admin/member/showmember',compact('data'));
    }
    // 会员添加的方法
    public function add(){
        if(Input::method() == 'POST'){
            // 自动验证
            // $this->validate($request,[..规则..]) 略
            // 数据入库>>>如果在模型中定义了fillable字段则可以使用create()直接创建数据
            $result = Member::insert([
                'username'    =>  Input::get('username'),
                'password'    =>  bcrypt('123456'),
                'gender'      =>  Input::get('gender'),
                'mobile'      =>  Input::get('mobile'),
                'email'       =>  Input::get('email'),
                // 从webupload文件上传response返回的的地址
                'avatar'      =>  Input::get('avatar'),
                'country_id'  =>  Input::get('country_id'),
                'province_id' =>  Input::get('province_id'),
                'city_id'     =>  Input::get('city_id'),
                'county_id'   =>  Input::get('county_id'),
                'created_at'  =>  date('Y-m-d H:i:s'),
                'type'        =>  Input::get('type'),
                'status'      =>  Input::get('status'),
            ]);
            return $result ? '1' : '0';
        }else{
            $country = DB::table('area')->where('pid','0')->get();
            return view('admin/member/add',compact('country'));
        }
    }
    // 四级联动的ajax异步请求
    public function getareabyid(){
        $id = Input::get('id');
        $data = DB::table('area')->where('pid',$id)->get();
        // laravel返回响应请求的方法是response()->json();
        return response()->json($data);
    }
}
