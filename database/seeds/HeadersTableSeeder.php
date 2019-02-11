<?php

use Illuminate\Database\Seeder;

class HeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('headers')->insert([
            'pages_id' => 1,
            'site_title' => 'Yannick Khemaja',
            'site_subtitle' => 'Développeur Web',
            'image_id' => 1,
            
        ]);
    }
}
