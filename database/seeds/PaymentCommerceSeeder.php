<?php

use guiaceliaca\PaymentCommerce;
use Illuminate\Database\Seeder;

class PaymentCommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentCommerce::class, 10)->create();
    }
}
