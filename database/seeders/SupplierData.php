<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name_store'=>'Guacho',
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
    }
}
