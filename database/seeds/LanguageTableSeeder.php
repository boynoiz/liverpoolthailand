<?php

use Illuminate\Database\Seeder;
use LTF\Language;

class LanguageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->delete();
        Language::create(['title' => 'English', 'code' => 'en', 'site_title' => 'Blog', 'site_description' => 'My Awesome Blog']);
//        Language::create(['title' => 'Thai', 'code' => 'th', 'site_title' => 'บล็อก', 'site_description' => 'บล็อกของฉัน']);

    }
}
