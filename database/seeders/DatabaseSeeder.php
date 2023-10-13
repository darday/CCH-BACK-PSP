<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductWarehouse;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\Warehouse;
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

        Supplier::create([
            'name_store'=>'Comercial Guacho',
            'phone'=>'0963124578',
            'address'=>'Riobamba Olmedo y la que cruza',
            'owner'=>'Sra Guacho',
        ]);
        Supplier::create([
            'name_store'=>'Constante',
            'phone'=>'0963124578',
            'address'=>'Ibarra - Olmedo y la que cruza',
            'owner'=>'Diego Constante',
        ]);
        Supplier::create([
            'name_store'=>'Kapak Urku',
            'phone'=>'0963124578',
            'address'=>'Riobamba - Coliseo',
            'owner'=>'Mayor',
        ]);


        Warehouse::create([
            'description'=>'General',
            'address'=>'Oficina CCH',
            'phone'=>'0961119670',
            'observation'=>'',
        ]);
        Warehouse::create([
            'description'=>'Bodega Dario',
            'address'=>'Tierra Nueva',
            'phone'=>'0961119670',
            'observation'=>'',
        ]);
        Warehouse::create([
            'description'=>'Bodega Jhon',
            'address'=>'Mercado la esperanza',
            'phone'=>'0997159098',
            'observation'=>'',
        ]);
        Warehouse::create([
            'description'=>'Bodega Luis',
            'address'=>'Complejo la Panadería',
            'phone'=>'0993786135',
            'observation'=>'Bodega casa Luchin',
        ]);

        Product::create([
            'category_id'=>'1',
            'supplier_id'=>'2',
            'description'=>'Carpa 2 Personas - Oursky',
            'buying_price'=>'66',
            'min_selling_price'=>'70',
            'selling_price'=>'75',
            'rent_price'=>'12',
            'entry_date'=>'2023-09-12',
        ]);
        Product::create([
            'category_id'=>'2',
            'supplier_id'=>'1',
            'description'=>'Sleeping Bag - Oursky -5',
            'buying_price'=>'25',
            'min_selling_price'=>'30',
            'selling_price'=>'35',
            'rent_price'=>'8',
            'entry_date'=>'2023-09-12',

        ]);

        Product::create([
            'category_id'=>'3',
            'supplier_id'=>'1',
            'description'=>'Aislante Térmico Plateado',
            'buying_price'=>'10',
            'min_selling_price'=>'13',
            'selling_price'=>'15',
            'rent_price'=>'5',
            'entry_date'=>'2023-09-12',

        ]);

        Product::create([
            'category_id'=>'3',
            'supplier_id'=>'1',
            'description'=>'Aislante Verde Acordeón',
            'buying_price'=>'10',
            'min_selling_price'=>'13',
            'selling_price'=>'15',
            'rent_price'=>'5',
            'entry_date'=>'2023-09-12',

        ]);

        Status::create([
            'status_id'=>'1',
            'description'=>'Nuevo',
            'varchar1'=>'',
        ]);
        Status::create([
            'status_id'=>'2',
            'description'=>'Bueno',
            'varchar1'=>'',
        ]);
        Status::create([
            'status_id'=>'3',
            'description'=>'Regular',
            'varchar1'=>'',
        ]);
        Status::create([
            'status_id'=>'4',
            'description'=>'Malo Funcional',
            'varchar1'=>'',
        ]);
        Status::create([
            'status_id'=>'5',
            'description'=>'Malo No funcional',
            'varchar1'=>'',
        ]);

        Inventory::create([
            'product_id'=>'1',
            'stock'=>'20',
            'inWarehouse'=>'2',
            'withoutWarehouse'=>'18',
            'status_id'=>'2',
            'observation'=>'',
        ]);
        Inventory::create([
            'product_id'=>'1',
            'stock'=>'2',
            'inWarehouse'=>'0',
            'withoutWarehouse'=>'2',
            'status_id'=>'5',
            'observation'=>'',
        ]);
        Inventory::create([
            'product_id'=>'2',
            'stock'=>'20',
            'inWarehouse'=>'0',
            'withoutWarehouse'=>'20',
            'status_id'=>'2',

            'observation'=>'',
        ]);
        Inventory::create([
            'product_id'=>'3',
            'stock'=>'20',
            'inWarehouse'=>'0',
            'withoutWarehouse'=>'20',
            'status_id'=>'2',

            'observation'=>'',
        ]);

        ProductWarehouse::create([
            'product_id'=>'1',
            'warehouse_id'=>'2',
            'quantity'=>'2',
            'product_status_id'=>'2',
        ]);
        


        

    }
}
