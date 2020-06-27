<?php

use guiaceliaca\Prices;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prices::class, 3)->create();
    }
}
