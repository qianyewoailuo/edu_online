<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
// 权限表模型
class Auth extends Model
{
    //定义关联模型的数据表
    protected $table = 'auth';
    // 禁用时间 
    public $timestamps = false;
}
