<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    //定义关联表
    protected $table = 'live';
    // 一对一关联专业
    public function profession(){
        $this->hasOne('App\Admin\Profession','id','profession_id');
    }
    // 一对一关联直播流
    public function stream(){
        $this->hasOne('App\Admin\Stream','id','stream_id');
    }
}
