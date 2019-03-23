<?php

use Illuminate\Database\Seeder;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //动漫数据添加
        DB::table('comic')->insert([
            [
                'comic_name' => '石头门',
                'comic_url'  => 'http://www.yxdm.tv/resource/6868.html',
                'img'        => 'comic/img/shitoumen',
                'updatetime' => '已完结' ,
                'is_end'    =>  '2',
                'created_at' =>  date('Y-m-d H:i:s'),
            ],
            [
                'comic_name' => '约定的梦幻岛',
                'comic_url'  => 'http://www.yxdm.tv/resource/9525.html',
                'img'        => 'comic/img/menghuandao',
                'updatetime' => '每周五01:25更新' ,
                'is_end'    =>  '1',
                'created_at' =>  date('Y-m-d H:i:s'),
            ],
            [
                'comic_name' => '盾之勇者',
                'comic_url'  => 'http://www.yxdm.tv/resource/8108.html',
                'img'        => 'comic/img/dunyong',
                'updatetime' => '每周三23:00更新' ,
                'is_end'    =>  '1',
                'created_at' =>  date('Y-m-d H:i:s'),
            ],
            [
                'comic_name' => '多罗罗',
                'comic_url'  => 'http://www.yxdm.tv/resource/8108.html',
                'img'        => 'comic/img/duoluoluo',
                'updatetime' => '每周一22:00更新' ,
                'is_end'    =>  '1',
                'created_at' =>  date('Y-m-d H:i:s'),
            ],
            [
                'comic_name' => '灵能百分百 第二季',
                'comic_url'  => 'http://www.yxdm.tv/resource/8108.html',
                'img'        => 'comic/img/linneng2',
                'updatetime' => '每周一23:30更新' ,
                'is_end'    =>  '1',
                'created_at' =>  date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
