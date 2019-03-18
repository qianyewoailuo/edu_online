<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use Illuminate\Support\Facades\Input;
use App\Admin\Auth;

class RoleController extends Controller
{
    //角色展示首页方法
    public function index()
    {
        $data = Role::get();
        return view('admin/role/index',compact('data'));
    }
    // 角色权限分派方法
    public function assign()
    {
        if(Input::method() == 'POST'){
            $data = Input::only('id','auth_id');
            // 模型处理数据
            $role = new Role();
            return $role -> assignAuth($data);
        }else{
            // 获取到当前操作的角色ID
            $id = Input::get('id');
            // 获取当前角色记录
            $name = Role::where('id','=',$id)->first();
            // 获取顶级分类权限
            $top = Auth::where('pid','=','0')->get();
            // 获取次级分类权限
            $cat = Auth::where('pid','!=','0')->get();
            // 获取当前角色权限ids 
            // 其实可以直接使用上面获取记录调用获得ids
            $ids = Role::where('id','=',$id)->value('auth_ids');
            // $ids = explode(',',$ids);
            return view('admin/role/assign',compact('top','cat','name','ids'));
        }
    }
    // 角色添加
    public function add()
    {
        if(Input::method() == 'POST'){
            $data = Input::except('_token');
            // var_dump($data);exit;
            // 模型处理数据
            $role = new Role();
            return $role->addRole($data);
        }else{
            // 获取顶级分类权限
            $top = Auth::where('pid','=','0')->get();
            // 获取次级分类权限
            $cat = Auth::where('pid','!=','0')->get();
            return view('admin/role/add',compact('top','cat'));
        }
    }
    // 角色删除
    public  function del()
    {
        $id = Input::get('id');
        // $result = Role::where('id',$id)->delete();
        // 真实业务中删除不应该直接删除数据,而是修改状态 此处暂时不删除了
        $result = '1';
        // var_dump($result);exit;
        if($result){
            $data = ['status' => '1','msg' => '删除成功'];
        }else{
            $data = ['status' => '0','msg' => '删除失败'];
        }
        return response()->json($data);
        // var_dump($id);exit;
    }
}
