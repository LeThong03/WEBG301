<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
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
                'cate_name'=>'IPhone',
                'cate_slug'=>str::slug('IPhone')
            ],
            [
                'cate_name'=>'Samsung',
                'cate_slug'=>str::slug('Samsung')
            ],
        ];
        DB::table('vp_categories')->insert($data);
    }
}
