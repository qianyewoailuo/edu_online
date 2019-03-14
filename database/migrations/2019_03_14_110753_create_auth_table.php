<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->increments('id');
            // 权限名称
            $table->string('auth_name',20)->notNull();
            // 控制器名称
            $table->string('controller',40)->nullable();
            // 方法名称
            $table->string('action',30)->nullable();
            // 父级ID
            $table->tinyInteger('pid');
            // 是否导航显示,1显示 2不显示
            $table->enum('is_nav',[1,2])->notNull()->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth');
    }
}
