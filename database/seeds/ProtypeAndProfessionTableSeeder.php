<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建模拟数据
        DB::table('profession') -> insert([
            'pro_name'		=>	'php基础班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'2,4,5,7',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	18,
            'cover_img'		=>	'/statics/profession.jpg',
            'price'			=>	'100.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'php就业班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'10,11,15,16',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	98,
            'cover_img'		=>	'/statics/profession.jpg',
            'price'			=>	'200.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'前端基础班',
            'protype_id'	=>	'2',
            'teachers_ids'	=>	'37,38,40,41',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	90,
            'cover_img'		=>	'/statics/profession.jpg',
            'price'			=>	'100.00'
        ]);
    }
}
