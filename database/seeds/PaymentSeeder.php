<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();

        $payments = [
            ['name'=>'Visa', 'photo'=>'style/payment/visa.png'],
            ['name'=>'MasterCard', 'photo'=>'style/payment/mastercard.png'],
            ['name'=>'AmericanExpress', 'photo'=>'style/payment/amex.png'],
            ['name'=>'AngenCard', 'photo'=>'style/payment/agencard.png'],
            ['name'=>'Cabal', 'photo'=>'style/payment/cabal.png'],
            ['name'=>'Maestro', 'photo'=>'style/payment/maestro.png'],
            ['name'=>'Diners Club', 'photo'=>'style/payment/diners.png'],
            ['name'=>'Visa Electron', 'photo'=>'style/payment/visaelectron.png'],
        ];

        foreach ($payments as $payment) {
            \guiaceliaca\Payment::create($payment);
        }
    }
}
