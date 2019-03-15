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

    // 分派权限数据处理
    public function assignAuth($data){
        $post['auth_ids'] = implode(',',$data['auth_id']);
        $temp = \App\Admin\Auth::where('pid','!=','0')->whereIn('id',$data['auth_id'])->get();
        $ac = '';
        foreach($temp as $val){
            $ac .= $val->controller.'@'.$val->action.',';
        }
        $post['auth_ac'] = strtolower(rtrim($ac,','));
        // var_dump($post);die;
        return self::where('id',$data['id']) -> update($post);
    }
}
