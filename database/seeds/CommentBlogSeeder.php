<?php

use Illuminate\Database\Seeder;

class CommentBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\guiaceliaca\CommentBlog::class, 310)->create();
    }
}
