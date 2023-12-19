<?php

namespace App\Http\Controllers;

use App\Models\RequestProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function requestProductSelect()
    {
        $prodList = DB::table('product_warehouses')
        ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
        ->join('products', 'inventories.product_id', '=', 'products.product_id')
        ->join('categories', 'products.category_id', '=', 'categories.categories_id')
        ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
        ->select('product_warehouses.product_warehouses_id  as product_warehouses_id', 'products.description as product','product_warehouses.quantity','statuses.description','products.product_id as product_id','categories.categories_id as category_id','inventories.inventories_id', 'categories.Description as description_products')        
        ->where('product_warehouses.warehouse_id', '=', 5)
        ->get();
        return $prodList;
    }

    // public function warehouseRequestProduct($id)
    // {
    //     $prodList = DB::table('product_warehouses')
    //     ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
    //     ->join('products', 'inventories.product_id', '=', 'products.product_id')
    //     ->join('categories', 'products.category_id', '=', 'categories.categories_id')
    //     ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
    //     ->select('product_warehouses.product_warehouses_id  as product_warehouses_id', 'products.description as product','product_warehouses.quantity','statuses.description','products.product_id as product_id','categories.categories_id as category_id','inventories.inventories_id')        
    //     ->where('product_warehouses.warehouse_id', '=', 5)
    //     ->where('product_warehouses.product_warehouses_id', '=', $id)
    //     ->get();
    //     return $prodList;
    // }

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
     * @param  \App\Models\RequestProducts  $requestProducts
     * @return \Illuminate\Http\Response
     */
    public function show(RequestProducts $requestProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestProducts  $requestProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestProducts $requestProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestProducts  $requestProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestProducts $requestProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestProducts  $requestProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestProducts $requestProducts)
    {
        //
    }
}
