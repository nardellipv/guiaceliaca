<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CommerceSeeder::class);
        $this->call(CharacteristicsSeeder::class);
//        $this->call(CharacteristicCommerceSeeder::class);
        $this->call(PaymentSeeder::class);
//        $this->call(PaymentCommerceSeeder::class);
        $this->call(ProvinceSeeder::class);
//        $this->call(BlogSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(NewsLetterSeeder::class);
//        $this->call(CommentBlogSeeder::class);
        $this->call(PromotionSeeder::class);
    }
}
