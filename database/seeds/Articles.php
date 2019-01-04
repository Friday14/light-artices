<?php

use Illuminate\Database\Seeder;

class Articles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Article::class, 10)->create();
    }
}
