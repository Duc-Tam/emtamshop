<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            ['name'=>'admin','display_name'=>'Quản lý hệ thống'],
            ['name'=>'dev','display_name'=>'Phát triển hệ thống'],
            ['name'=>'content','display_name'=>'Quản lý nội dung'],
            ['name'=>'order','display_name'=>'Nhân viên chốt đơn'],
        ]);
    }
}
