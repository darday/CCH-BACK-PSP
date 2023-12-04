<?php

namespace App\Http\Controllers;

use App\Models\request_complete_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestCompleteProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $request_complete = DB::table('request_complete_products')
            ->join('users', 'request_complete_products.user_id', '=', 'users.id')
            ->select('request_complete_products.request_complete_products_id', 'users.name', 'users.last_name', 'request_complete_products.detail', 'request_complete_products.fecha')
            ->where('users.id', '=', $id)
            // ->where('users.rol', '=', 'guide')
            // ->orderBy('products.description')
            ->get();

        return $request_complete;
    }

    // public function productsListGuide($id)
    // {//return $id;
    //     $product = DB::table('request_products_to_warehouses')
    //         ->join('products', 'request_products_to_warehouses.product_id', '=', 'products.product_id')
    //         ->join('categories', 'request_products_to_warehouses.category_id', '=', 'categories.categories_id')
    //         ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
    //         ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
    //         ->select('request_complete_products.request_complete_products_id','request_products_to_warehouses.request_products_to_warehouses_id', 'users.rol', 'request_products_to_warehouses.quantity_products', 'products.description as description_product', 'categories.description as category_product', 'products.selling_price as unitary_price', DB::raw('request_products_to_warehouses.quantity_products * products.selling_price as total_price'))
    //         ->where('users.id', '=', 2)
    //         ->where('request_products_to_warehouses.request_products_to_warehouses_id', '=', $id)
    //         // ->where('users.rol', '=', 'guide')
    //         // ->orderBy('products.description')
    //         ->get();

    //     return $product;
    // }

    public function productsListGuide($requestCompleteProductsId)
    {
        // $products = DB::table('request_products_to_warehouses')
        //     ->join('products', 'request_products_to_warehouses.product_id', '=', 'products.product_id')
        //     ->join('categories', 'request_products_to_warehouses.category_id', '=', 'categories.categories_id')
        //     ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
        //     ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
        //     ->select(
        //         'request_complete_products.request_complete_products_id',
        //         'request_products_to_warehouses.request_products_to_warehouses_id',
        //         'users.rol',
        //         'request_products_to_warehouses.quantity_products',
        //         'products.description as description_product',
        //         'categories.description as category_product',
        //         'products.selling_price as unitary_price',
        //         DB::raw('request_products_to_warehouses.quantity_products * products.selling_price as total_price')
        //     )
        //     ->where('users.id', '=', 2) // Cambié '2' por 2 ya que parece ser un valor numérico
        //     ->where('request_complete_products.request_complete_products_id', '=', $requestCompleteProductsId)
        //     ->get();
        // return $products;


        $products = DB::table('request_products_to_warehouses')
            ->join('product_warehouses', 'request_products_to_warehouses.product_warehouses_id', '=', 'product_warehouses.product_warehouses_id')
            ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
            ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
            ->select(
                'request_complete_products.request_complete_products_id',
                'request_products_to_warehouses.request_products_to_warehouses_id',
                'users.rol',
                'request_products_to_warehouses.quantity_products',
                'products.description as description_product',
                'categories.description as category_product',
                'products.selling_price as unitary_price',
                'request_complete_products.detail as detail_title',
                DB::raw('request_products_to_warehouses.quantity_products * products.selling_price as total_price')
            )
            ->where('users.id', '=', 2) // Cambié '2' por 2 ya que parece ser un valor numérico
            ->where('request_complete_products.request_complete_products_id', '=', $requestCompleteProductsId)
            ->get();
        return $products;
    }

    public function productsListTitle($requestProductTitle)
    {
        $requestDetail = DB::table('request_complete_products')
            ->select('detail', 'fecha')
            ->where('request_complete_products_id', $requestProductTitle)
            ->get(); // Agregar el método get() para obtener los resultados

        return $requestDetail;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\request_complete_products  $request_complete_products
     * @return \Illuminate\Http\Response
     */
    public function show(request_complete_products $request_complete_products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\request_complete_products  $request_complete_products
     * @return \Illuminate\Http\Response
     */
    public function edit(request_complete_products $request_complete_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\request_complete_products  $request_complete_products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, request_complete_products $request_complete_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\request_complete_products  $request_complete_products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resp = request_complete_products::where('request_complete_products_id', $id)->delete();
        if ($resp == 1) {
            return ([
                "messagge" => 'Solicitud eliminada exitosamente',
                "response" => '200',
                "success" => true,
            ]);
        } else {
            return ([
                "messagge" => 'Solicitud ya eliminada',
                "response" => '500',
                "success" => false,
            ]);
        }
    }
}
