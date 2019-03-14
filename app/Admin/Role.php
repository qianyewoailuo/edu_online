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
}
