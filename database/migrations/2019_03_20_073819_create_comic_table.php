<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comic_name')->notNull()->comment('动漫名称');
            $table->string('comic_url')->notNull()->comment('下载链接');
            $table->string('img')->notNull()->comment('展示图');
            $table->string('updatetime',50)->notNull()->default('N/A')->comment('更新时间');
            $table->enum('is_end',[1,2])->notNull()->default(1)->comment('展示图,1为未完结');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic');
    }
}
