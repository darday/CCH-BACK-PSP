<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;

class SeedForProduction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Category::create([
            'Description' => 'Carpas',
        ]);
        Category::create([
            'Description' => 'Sleepings',
        ]);
        Category::create([
            'Description' => 'Aislantes',
        ]);
        Category::create([
            'Description' => 'Equipos de Cocina',
        ]);
        Category::create([
            'Description' => 'Iluminación',
        ]);
        Category::create([
            'Description' => 'Ropa y Calzado',
        ]);
        Category::create([
            'Description' => 'Herramientas y Cuchillos',
        ]);
        Category::create([
            'Description' => 'Equipo de Senderismo',
        ]);
        Category::create([
            'Description' => 'Seguridad y Primeros Auxilios',
        ]);
        Category::create([
            'Description' => 'Electrónica',
        ]);
        Category::create([
            'Description' => 'Refrigerios',
        ]);
        Category::create([
            'Description' => 'Desayuno',
        ]);
        Category::create([
            'Description' => 'Merienda',
        ]);
        // Category::create([
        //     'Description'=>'Alimentos',
        // ]);

        Supplier::create([
            'name_store' => 'Comercial Guacho',
            'phone' => '0963124578',
            'address' => 'Riobamba Olmedo y la que cruza',
            'owner' => 'Sra Guacho',
        ]);
        Supplier::create([
            'name_store' => 'Titan',
            'phone' => '9999999',
            'address' => 'Parque Industrial',
            'owner' => 'Gerente titan',
        ]);
        Supplier::create([
            'name_store' => 'Constante',
            'phone' => '0963124578',
            'address' => 'Ibarra - Olmedo y la que cruza',
            'owner' => 'Diego Constante',
        ]);
        Supplier::create([
            'name_store' => 'Kapak Urku',
            'phone' => '0963124578',
            'address' => 'Riobamba - Coliseo',
            'owner' => 'Mayor',
        ]);
        Supplier::create([
            'name_store' => 'Dicosavi',
            'phone' => '0963124578',
            'address' => 'Riobamba - Guayaquil y 5 de junio',
            'owner' => 'Mayor',
        ]);


        Warehouse::create([
            'description' => 'General',
            'address' => 'Oficina CCH',
            'phone' => '0961119670',
            'observation' => 'Aquí están las cosas para alquilar y vender',
        ]);
        Warehouse::create([
            'description' => 'Bodega Dario',
            'address' => 'Tierra Nueva',
            'phone' => '0961119670',
            'observation' => '',
        ]);
        Warehouse::create([
            'description' => 'Bodega Jhon',
            'address' => 'Mercado la esperanza',
            'phone' => '0997159098',
            'observation' => '',
        ]);
        Warehouse::create([
            'description' => 'Bodega Luis',
            'address' => 'Complejo la Panadería',
            'phone' => '0993786135',
            'observation' => 'Bodega casa Luchin',
        ]);

        Warehouse::create([
            'description' => 'Bodega Alimentación',
            'address' => 'Redondel del Libro',
            'phone' => '0995300403',
            'observation' => 'Mamá Darío - María Paca',
        ]);

        Status::create([
            'status_id' => '1',
            'description' => 'Nuevo',
            'category_status' => 'Productos',
        ]);
        Status::create([
            'status_id' => '2',
            'description' => 'Bueno',
            'category_status' => 'Productos',
        ]);
        Status::create([
            'status_id' => '3',
            'description' => 'Regular',
            'category_status' => 'Productos',
        ]);
        Status::create([
            'status_id' => '4',
            'description' => 'Malo Funcional',
            'category_status' => 'Productos',
        ]);
        Status::create([
            'status_id' => '5',
            'description' => 'Malo No funcional',
            'category_status' => 'Productos',
        ]);
        Status::create([
            'status_id' => '6',
            'description' => 'No paga nada',
            'category_status' => 'Pagos de Pasajeros',
        ]);
        Status::create([
            'status_id' => '7',
            'description' => 'Pagado Todo',
            'category_status' => 'Pagos de Pasajeros',
        ]);
        Status::create([
            'status_id' => '8',
            'description' => 'Pago Parcial',
            'category_status' => 'Pagos de Pasajeros',
        ]);
        Status::create([
            'status_id' => '9',
            'description' => 'No Aplica - Acompañante',
            'category_status' => 'Pagos de Pasajeros',
        ]);

        User::create([
            'name' => 'Administrador',
            'last_name' => 'Sistema',
            'rol' => 'admin',
            'email' => 'adminsistema@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'Darío',
            'last_name' => 'Janeta',
            'rol' => 'guide',
            'email' => 'dariojaneta@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'Luis',
            'last_name' => 'Yumiseba',
            'rol' => 'guide',
            'email' => 'luisyumiseba@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'John',
            'last_name' => 'Santos',
            'rol' => 'guide',
            'email' => 'johnsantos@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'María',
            'last_name' => 'Paca',
            'rol' => 'shopkeeper',
            'email' => 'mariapaca@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
