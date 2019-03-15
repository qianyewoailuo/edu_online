<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 数据填充
        // 实例中文faker对象
        $faker = \Faker\Factory::create('zh_CN');
        // 创建数据
        $data = [];
        for ($i=0; $i < 500; $i++) { 
            $data[] = [
                'username'  =>  $faker->userName,
                'password'  =>  bcrypt('123456'),
                'gender'    =>  rand(1,3),
                'mobile'    =>  $faker->phoneNumber,
                'email'     =>  $faker->email,
                'avatar'    =>  '/statics/avater.jpg',
                'created_at'=>  date('Y-m-d H:i:s'),
                'type'      =>  rand(1,2),
                'status'    =>  rand(1,2),
            ];
        }
        // 写入数据
        DB::table('member')->insert($data);
    }
}
