<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        factory(LTF\Category::class, 5)->create();
    }
}
