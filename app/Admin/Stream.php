<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    // 定义关联表
    protected $table = 'stream';
    // 禁止操作时间
    public $timestamps = false;

}
