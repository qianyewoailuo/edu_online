<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    // 定义当前模型的关联数据表
    protected $table = 'manager';
    // 定义fillable

    // trait引用实现接口的抽象方法
    use Authenticatable;
}
