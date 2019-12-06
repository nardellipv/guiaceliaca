<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            ['id' => 1, 'name' => 'Alfajores'],
            ['id' => 2, 'name' => 'Panes y Budines'],
            ['id' => 3, 'name' => 'Pastas'],
            ['id' => 4, 'name' => 'Galletas dulces y saladas'],
            ['id' => 5, 'name' => 'Cereales'],
            ['id' => 6, 'name' => 'Polvo para pizzas, tartas, empanadas'],
            ['id' => 7, 'name' => 'Harinas y Premezclas'],
            ['id' => 8, 'name' => 'Tartas y Empanadas'],
            ['id' => 9, 'name' => 'Golosinas'],
            ['id' => 10, 'name' => 'Rebozadores'],
            ['id' => 11, 'name' => 'Sopas y Caldos'],
            ['id' => 12, 'name' => 'Otros'],
        ];

        foreach ($categories as $category) {
            \guiaceliaca\Category::create($category);
        }
    }
}
