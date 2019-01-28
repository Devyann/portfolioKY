<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'order' => 1,
            'page_id' => 1,
            'post_title' => 'Présentation',
            'post_subtitle' => 'En quelques mots',
            'content' => 'Bienvenue sur mon portfolio, celui-ci est construit comme une <em>SPA</em> avec Vue.js pour la gestion du Frontend et Laravel pour la partie Backend',
            'links' => json_encode(array(array('name' => 'Contact', 'href' => '#'), array('name' => 'Curriculum vitae', 'href' => '#')))

        ]);
    }
}
