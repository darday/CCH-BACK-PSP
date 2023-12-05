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
            'name_store'=>'Comercial Guacho',
            'phone'=>'0963124578',
            'address'=>'Riobamba Olmedo y la que cruza',
            'owner'=>'Sra Guacho',
        ]);
        Supplier::create([
            'name_store'=>'Titan',
            'phone'=>'9999999',
            'address'=>'Parque Industrial',
            'owner'=>'Gerente titan',
        ]);
        Supplier::create([
            'name_store'=>'Constante',
            'phone'=>'0963124578',
            'address'=>'Ibarra ',
            'owner'=>'Diego Fuentes',
        ]);
        Supplier::create([
            'name_store'=>'Kapak Urku',
            'phone'=>'0963124578',
            'address'=>'Riobamba - Coliseo',
            'owner'=>'Mayor',
        ]);
        Supplier::create([
            'name_store'=>'Dicosavi',
            'phone'=>'0963124578',
            'address'=>'Riobamba - Guayaquil y 5 de junio',
            'owner'=>'Mayor',
        ]);
        Supplier::create([
            'name_store'=>'Mi Comisariato',
            'phone'=>'0963124578',
            'address'=>'Riobamba - Paseo Shopping',
            'owner'=>'Shopping',
        ]);
    }
}
