<?php

use Illuminate\Database\Seeder;

class NewsLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\guiaceliaca\NewsLetter::class, 103)->create();
    }
}
