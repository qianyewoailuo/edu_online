<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            // 管理用户表字段

            $table->increments('id');
            // 用户名
            $table->string('username',20)->notNull();
            // 密码 |
            $table->string('password')->notNull();
            // 性别 |1=>男|2-女|3-保密
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            // 手机号
            $table->string('mobile',11);
            // 邮箱 
            $table->string('email',50);
            // 角色表ID
            $table->tinyInteger('role_id');
            // laravel系统自创
            $table->timestamps();
            // 记住登陆
            $table->rememberToken();
            // 账号状态 1 禁用 | 2 启用
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
