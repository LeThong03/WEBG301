<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin'),
                'level'=>'1'
            ],
        ];
        DB::table('vp_user')->insert($data);
    }
}
