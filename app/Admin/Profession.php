<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //定义模型关联的表
    protected $table = 'profession';

    // Profession表一对一的关联protype表
    public function protype(){
        return $this->hasOne('App\Admin\Protype','id','protype_id');
    }
}
