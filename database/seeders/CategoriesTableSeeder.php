<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 
use App\Models\User; 

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'Description'=>'Carpas',
        ]);
        Category::create([
            'Description'=>'Sleepings',
        ]);
        Category::create([
            'Description'=>'Aislantes',
        ]);
        Category::create([
            'Description'=>'Equipos de Cocina',
        ]);
        Category::create([
            'Description'=>'Iluminación',
        ]);
        Category::create([
            'Description'=>'Ropa y Calzado',
        ]);
        Category::create([
            'Description'=>'Herramientas y Cuchillos',
        ]);
        Category::create([
            'Description'=>'Equipo de Senderismo',
        ]);
        Category::create([
            'Description'=>'Seguridad y Primeros Auxilios',
        ]);
        Category::create([
            'Description'=>'Electrónica',
        ]);
        Category::create([
            'Description'=>'Refrigerios',
        ]);
        Category::create([
            'Description'=>'Desayuno',
        ]);
        Category::create([
            'Description'=>'Merienda',
        ]);


       
    }
}
