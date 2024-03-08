<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Enterprise;
use App\Models\Inventory;
use App\Models\MonthlyTour;
use App\Models\Passenger;
use App\Models\PassengerList;
use App\Models\Product;
use App\Models\ProductWarehouse;
use App\Models\SoftwareTipe;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        Product::create([
            'category_id' => '1',
            'supplier_id' => '2',
            'description' => 'Carpa 2 Personas - Oursky',
            'buying_price' => '66',
            'min_selling_price' => '70',
            'selling_price' => '75',
            'rent_price' => '12',
            'entry_date' => '2023-09-12',
        ]);
        Product::create([
            'category_id' => '2',
            'supplier_id' => '1',
            'description' => 'Sleeping Bag - Oursky -5',
            'buying_price' => '25',
            'min_selling_price' => '30',
            'selling_price' => '35',
            'rent_price' => '8',
            'entry_date' => '2023-09-12',

        ]);

        Product::create([
            'category_id' => '3',
            'supplier_id' => '1',
            'description' => 'Aislante Térmico Plateado',
            'buying_price' => '10',
            'min_selling_price' => '13',
            'selling_price' => '15',
            'rent_price' => '5',
            'entry_date' => '2023-09-12',

        ]);

        Product::create([
            'category_id' => '3',
            'supplier_id' => '1',
            'description' => 'Aislante Verde Acordeón',
            'buying_price' => '10',
            'min_selling_price' => '13',
            'selling_price' => '15',
            'rent_price' => '5',
            'entry_date' => '2023-09-12',
        ]);

        Product::create([
            'category_id' => '13',
            'supplier_id' => '5',
            'description' => 'Galletas Ducales',
            'buying_price' => '1.5',
            'min_selling_price' => '2',
            'selling_price' => '2',
            'rent_price' => '2.1',
            'entry_date' => '2023-11-17',
        ]);

        Product::create([
            'category_id' => '12',
            'supplier_id' => '2',
            'description' => 'Yogurt Toni',
            'buying_price' => '0.5',
            'min_selling_price' => '0.75',
            'selling_price' => '0.75',
            'rent_price' => '0.85',
            'entry_date' => '2023-11-17',
        ]);

        Product::create([
            'category_id' => '11',
            'supplier_id' => '5',
            'description' => ' Pan Supan',
            'buying_price' => '2',
            'min_selling_price' => '2.5',
            'selling_price' => '2.5',
            'rent_price' => '2.6',
            'entry_date' => '2023-11-17',
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

        Inventory::create([
            'product_id' => '1',
            'stock' => '20',
            'inWarehouse' => '2',
            'withoutWarehouse' => '18',
            'status_id' => '2',
            'observation' => '',
        ]);
        Inventory::create([
            'product_id' => '1',
            'stock' => '2',
            'inWarehouse' => '0',
            'withoutWarehouse' => '2',
            'status_id' => '5',
            'observation' => '',
        ]);
        Inventory::create([
            'product_id' => '2',
            'stock' => '20',
            'inWarehouse' => '0',
            'withoutWarehouse' => '20',
            'status_id' => '2',

            'observation' => '',
        ]);
        Inventory::create([
            'product_id' => '3',
            'stock' => '20',
            'inWarehouse' => '0',
            'withoutWarehouse' => '20',
            'status_id' => '2',

            'observation' => '',
        ]);

        ProductWarehouse::create([
            'product_id' => '1',
            'warehouse_id' => '1',
            'quantity' => '2',
            'inventories_id' => '1',
            'product_status_id' => '2',
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


        Passenger::create([
            'ci' => '0603935008',
            'name' => 'Darío Javier Janeta Paca',
            'phone' => '0961119670',
            'city' => 'Riobamba',
            'correo' => 'darday1980@gmail.com',
            'age' => '29',
            'password' => '123456789',
        ]);
        Passenger::create([
            'ci' => '0606020345',
            'name' => 'Auki Gabriel Janeta Paca',
            'phone' => '0961119670',
            'city' => 'Riobamba',
            'correo' => 'auki@gmail.com',
            'age' => '18',
            'password' => '123456789',
        ]);
        Passenger::create([
            'ci' => '0606020313',
            'name' => 'Maria Manuela Paca',
            'phone' => '0961119670',
            'city' => 'Riobamba',
            'correo' => 'maria@gmail.com',
            'age' => '53',
            'password' => '123456789',
        ]);
        Passenger::create([
            'ci' => '0603574125',
            'name' => 'David Paca',
            'phone' => '0961119670',
            'city' => 'Riobamba',
            'correo' => 'david@gmail.com',
            'age' => '53',
            'password' => '123456789',
        ]);


        MonthlyTour::create([
            'tour_name' => 'CAMPING SOBRE LAS NUBES',
            'tour_destiny' => 'PUÑAY',
            'description' => 'Acompalnois',
            'include' => 'asdawdaw',
            'img_1' => 'awdaw',
            'img_2' => 'awdaw',
            'state' => '1',
            'type' => 'camping',
            'dificulty' => 'alta',
            'person_cost' => '40',
            'group_cost' => '35',
            'discount' => '0',
            'income' => '0',
            'egress' => '0',
            'utility' => '0',
            'contact_phone' => '0961119670',
            'messagge_for_contact' => 'mensaje',
            'departure_date' => '2024-01-17',
            'return_date' => '2024-01-18',
        ]);
        MonthlyTour::create([
            'tour_name' => 'PON A PRUEBA TU MENTE Y CUERPO',
            'tour_destiny' => 'ALTAR',
            'description' => 'Acompalnois',
            'include' => 'asdawdaw',
            'img_1' => 'awdaw',
            'img_2' => 'awdaw',
            'state' => '1',
            'type' => 'camping',
            'dificulty' => 'alta',
            'person_cost' => '75',
            'group_cost' => '67',
            'discount' => '0',
            'income' => '0',
            'egress' => '0',
            'utility' => '0',
            'contact_phone' => '0961119670',
            'messagge_for_contact' => 'mensaje',
            'departure_date' => '2024-01-17',
            'return_date' => '2024-01-18',
        ]);
        MonthlyTour::create([
            'tour_name' => 'CAMPING EN EL CRATER DE UN VOLCÁN',
            'tour_destiny' => 'QUILOTOA',
            'description' => 'Acompalnois',
            'include' => 'asdawdaw',
            'img_1' => 'awdaw',
            'img_2' => 'awdaw',
            'state' => '1',
            'type' => 'camping',
            'dificulty' => 'alta',
            'person_cost' => '40',
            'group_cost' => '35',
            'discount' => '0',
            'income' => '0',
            'egress' => '0',
            'utility' => '0',
            'contact_phone' => '0961119670',
            'messagge_for_contact' => 'mensaje',
            'departure_date' => '2024-01-17',
            'return_date' => '2024-01-18',
        ]);

        PassengerList::create([
            'list_id' => '1',
            'passenger_id' => '1',
            'seat' => '3',
            'unit_cost' => '40',
            'total_cost' => '120',
            'collected' => '40',
            'bus_extra' => '0',
            'to_collect' => '80',
            'bank' => 'Pichincha',
            'responsable' => 'Guia 1',
            'meeting_point' => 'Terminal Riobamba',
            'observation' => 'No come carne, Dice que va a pagar el resto el d[ia de la ruta',
            'passenger_type' => 'Responsable',
            'id_passenger_group_leader' => '1',
            'img_cmp_1' => 'img1',
            'img_cmp_2' => 'img2',
            'state' => '8',

        ]);
        PassengerList::create([
            'list_id' => '1',
            'passenger_id' => '2',
            'seat' => '0',
            'unit_cost' => '40',
            'total_cost' => '0',
            'collected' => '0',
            'bus_extra' => '0',
            'to_collect' => '0',
            'bank' => 'Pichincha',
            'responsable' => 'Guia 1',
            'meeting_point' => 'Terminal Riobamba',
            'observation' => 'No come carne, Dice que va a pagar el resto el d[ia de la ruta',
            'passenger_type' => 'Acompañante',
            'id_passenger_group_leader' => '1',
            'img_cmp_1' => 'null',
            'img_cmp_2' => 'null',
            'state' => '9',

        ]);
        PassengerList::create([
            'list_id' => '1',
            'passenger_id' => '3',
            'seat' => '0',
            'unit_cost' => '40',
            'total_cost' => '0',
            'collected' => '0',
            'bus_extra' => '0',
            'to_collect' => '0',
            'bank' => 'Pichincha',
            'responsable' => 'Guia 1',
            'meeting_point' => 'Terminal Riobamba',
            'observation' => 'No come carne, Dice que va a pagar el resto el d[ia de la ruta',
            'passenger_type' => 'Acompañante',
            'id_passenger_group_leader' => '1',
            'img_cmp_1' => 'null',
            'img_cmp_2' => 'null',
            'state' => '9',

        ]);

        SoftwareTipe::create([
            'software_type_id'=>'1',
            'description'=>'Full',
        ]);
        SoftwareTipe::create([
            'software_type_id'=>'2',
            'description'=>'Inventario',
        ]);
        SoftwareTipe::create([
            'software_type_id'=>'3',
            'description'=>'Demo',
        ]);

        Enterprise::create([
            'enterprise_id'=>'1',
            'enterprise_name'=>'Camping Chimborazo',
            'phone'=>'0961119670',
            'address'=>'Esteban Marañon y Lope Antonio de Munive',
            'manager'=>'Luis Yumiseba',
            'img'=>'campingchimborazo.png',
            'software_type_id'=>'1',
        ]);
    }
}
