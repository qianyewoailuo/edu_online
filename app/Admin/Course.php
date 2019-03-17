<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //定义模型关联的表
    protected $table = 'course';
    // course表一对一关联profession表
    public function profession(){
        return $this->hasOne('App\Admin\Profession','id','profession_id');
    }
}
