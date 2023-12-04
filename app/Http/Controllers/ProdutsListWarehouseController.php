<?php

namespace App\Http\Controllers;

use App\Models\ProdutsListWarehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutsListWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $prodList = DB::table('warehouses')
            ->join('product_warehouses', 'product_warehouses.warehouse_id', '=', 'warehouses.warehouse_id')
            ->join('inventories', 'inventories.inventories_id', '=', 'product_warehouses.inventories_id')
            ->join('products', 'products.product_id', '=', 'inventories.product_id')
            ->join('categories', 'categories.categories_id', '=', 'products.category_id')
            ->join('statuses', 'statuses.status_id', '=', 'inventories.status_id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
            ->select('warehouses.warehouse_id as warehouse_id', 'warehouses.description as warehouse', 
            'product_warehouses.quantity as quantity', 'products.product_id as product_id','products.img as img', 
            'products.description as product', 'inventories.status_id as status_id', 'statuses.description as status',
            'product_warehouses.observation', 'product_warehouses.product_warehouses_id' , 
            'product_warehouses.inventories_id', 
            'suppliers.name_store','categories.description')
            // ->orderBy('products.description')
            ->where('warehouses.warehouse_id', '=', 5)
            ->get();

            return $prodList;
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
     * @param  \App\Models\ProdutsListWarehouse  $produtsListWarehouse
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutsListWarehouse $produtsListWarehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutsListWarehouse  $produtsListWarehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutsListWarehouse $produtsListWarehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutsListWarehouse  $produtsListWarehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutsListWarehouse $produtsListWarehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutsListWarehouse  $produtsListWarehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutsListWarehouse $produtsListWarehouse)
    {
        //
    }
}
