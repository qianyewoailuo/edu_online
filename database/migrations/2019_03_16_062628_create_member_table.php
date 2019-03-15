<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member',function($table){
            $table -> increments('id'); 
            $table -> string('username',20) -> notNull();
            $table -> string('password') -> notNull();
            // 性别 1=男 |2=女|3=保密
            $table -> enum('gender',[1,2,3]) -> nutNull() -> default('1');
            $table -> string('mobile',11);
            $table -> string('email',40);
            // 头像
            $table -> string('avatar');
            $table -> timestamps();
            $table -> rememberToken();
            // 类型 1=学生 2=教师
            $table -> enum('type',[1,2]) -> notNull() -> default('1');
            // 账号状态 1=禁用 2=启用 
            $table -> enum('status',[1,2]) -> notNull() -> default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
