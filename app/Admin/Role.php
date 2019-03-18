<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
// 角色表模型
class Role extends Model
{
    //定义关联模型的数据表
    protected $table = 'role';
    // 禁用时间 
    public $timestamps = false;

    // 处理角色表单数据返回包含auth_ids与auth_ac数组的方法
    public function processingData($data)
    {
        $post['auth_ids'] = implode(',',$data['auth_id']);
        $temp = \App\Admin\Auth::where('pid','!=','0')->whereIn('id',$data['auth_id'])->get();
        $ac = '';
        foreach($temp as $val){
            $ac .= $val->controller.'@'.$val->action.',';
        }
        $post['auth_ac'] = strtolower(rtrim($ac,','));
        return $post;
    }

    // 分派权限数据处理
    public function assignAuth($data)
    {
        // $post['auth_ids'] = implode(',',$data['auth_id']);
        // $temp = \App\Admin\Auth::where('pid','!=','0')->whereIn('id',$data['auth_id'])->get();
        // $ac = '';
        // foreach($temp as $val){
        //     $ac .= $val->controller.'@'.$val->action.',';
        // }
        // $post['auth_ac'] = strtolower(rtrim($ac,','));
        $post = $this->processingData($data);
        // var_dump($post);die;
        return self::where('id',$data['id']) -> update($post);
    }
    // 添加角色
    public function addRole($data)
    {
        $post = $this->processingData($data);
        $post['role_name'] = $data['role_name'];
        // var_dump($post);exit;
        return self::insert($post)? '1' : '0';
    }
}
