<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
// use Input;
// use Captcha;

class PublicController extends Controller
{
    /**
     * 登录页面展示的方法
     * 这里使用get|post请求分离的路由进行登录页面展示与验证登录
     * 也可以使用any请求方式,只要判断当前操作是get|other
     *      判断方法:1.$request->Method() == 'GET' | $request->isMethod('get')
     *              2.Input::Method() == 'GET'
     *      当然,使用$request先在方法中实例类 | 使用Input门面要先引入门面类 
     */ 
    public function login(){
        //登录页面视图
        return view('admin.public.login');
    }
    /**
     * 验证登录的方法
     * 
     * 实现过程简要示例
     * 1.使用自动验证->其中的模板验证对错判断代码可以在手册中摘取
     * 2.优化自动验证提示,使用layer.js提示->注意验证码自动验证中文提示信息需在lang配置中增加
     * 3.使用用户验证 关键点:
     *      一.获取并保存请求接受到的数据
     *      二.使用Auth门面方法 attempt($data,$request->get('remember')) 认证
     *      三.注意Auth门面指定guard的模型实例在\config\auth.php中添加,且模型需继承Authenticatable接口并实现
     *      四.判断验证返回true|false 并根据个人逻辑进行页面跳转或逻辑功能
     */
    public function check(Request $request){
        // 自动验证
        $this->validate($request,[
            // 用户名
            'username'   =>  'required|min:2|max:20',
            // 密码
            'password'  =>  'required|min:6',
            // 验证码
            'captcha'   =>  'required|captcha'
        ]);
        // 用户认证
        $data = $request -> only([
            'username','password'
        ]);
        $data['status'] = '2';
        // attempt第一个参数数组中的值被用于从数据表中查找用户,第二个参数是$remeber值
        $result = Auth::guard('admin') -> attempt($data,$request->get('online'));
        // dd($result);
        if($result){
            // 验证成功转到后台首页
            return redirect('/admin/index/index');
        }else{
            // 验证失败重定向回登录页面 注意使用连贯操作->withErrors(错误数组)返回错误信息提示
            return redirect('/admin/public/login')->withErrors([
                'loginErrors' => '用户名或密码错误'
            ]);
        }
    }
    // 退出登录的方法
    public function logout(){
        // 使用Auth门面调用logout方法即可实现退出登录
        Auth::guard('admin')->logout();
        return redirect('/admin/public/login');
    }
}
