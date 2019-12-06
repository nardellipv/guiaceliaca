<?php

use Illuminate\Database\Seeder;

class CharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->delete();

        $characteristics = [
            ['name'=>'Mesas al aire libre', 'photo'=>'style/characteristic/sun.png'],
            ['name'=>'Juegos para chicos', 'photo'=>'style/characteristic/children.png'],
            ['name'=>'Aire Acondicionado', 'photo'=>'style/characteristic/air-conditioner.png'],
            ['name'=>'Menú Ejecutivo', 'photo'=>'style/characteristic/dinner.png'],
            ['name'=>'Estacionamiento', 'photo'=>'style/characteristic/parking.png'],
            ['name'=>'Accesibilidad', 'photo'=>'style/characteristic/wheelchair.png'],
            ['name'=>'Wi-Fi', 'photo'=>'style/characteristic/wifi.png'],
            ['name'=>'Barra de Tragos', 'photo'=>'style/characteristic/cocktail.png'],
        ];

        foreach ($characteristics as $characteristic) {
            \guiaceliaca\Characteristics::create($characteristic);
        }
    }
}
