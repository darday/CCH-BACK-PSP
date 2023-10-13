<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id'=>'1',
            'supplier_id'=>'2',
            'description'=>'Carpa 2 Personas - Oursky',
            'buying_price'=>'66',
            'min_selling_price'=>'70',
            'selling_price'=>'75',
            'rent_price'=>'12',
        ]);
        Product::create([
            'category_id'=>'2',
            'supplier_id'=>'1',
            'description'=>'Sleeping Bag - Oursky -5',
            'buying_price'=>'25',
            'min_selling_price'=>'30',
            'selling_price'=>'35',
            'rent_price'=>'8',
        ]);
    }
}
