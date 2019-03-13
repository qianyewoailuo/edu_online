<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用fakeer类生成测试数据

        // 实例化faker对象
        $faker = \Faker\Factory::create('zh_CN');
        // 循环生成数据
        $data = [];
        for ($i = 0; $i < 100; $i++) { 
            $data[] = [
                'username'    =>  $faker->userName,
                // bctypt()是laravel自带的加密函数
                'password'    =>  bcrypt('luo12345'),
                'gender'      =>  rand(1,3),
                'mobile'      =>  $faker->phoneNumber,
                'email'       =>  $faker->email,
                'role_id'     =>  rand(1,6),
                'created_at'  =>  date('Y-m-d H:i:s',time()),
                'status'      =>  rand(1,2)
            ];
        }
        // 写入数据库
        DB::table('manager')->insert($data);
    }
}
