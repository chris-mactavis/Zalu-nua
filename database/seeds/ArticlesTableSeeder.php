<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => str_random(10),
            'content' => str_random(10).'@gmail.com',
            'banner' => bcrypt('secret'),
        ]);
    }
}
