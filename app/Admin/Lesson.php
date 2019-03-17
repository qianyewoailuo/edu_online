<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //定义模型关联的表
    protected $table = 'lesson';

    // lesson表一对一关联course表
    public function course(){
        return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
