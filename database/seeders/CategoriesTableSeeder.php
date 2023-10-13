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


        // User::create([
        //     'name'=>'Admin',
        //     'last_name'=>'Sistema',
        //     'ci'=>'1234567890',
        //     'email'=>'adminsistema@gmail.com',
        //     'email_verified'=>'adminsistema@gmail.com',
        //     'password'=>'123456789',
        //     'password_confirmation'=>'123456789',
        //     'rol'=>'admin',
        //     'cellphone'=>'0961119670',
        // ]);
    }
}
