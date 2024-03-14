<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse = Warehouse::orderBy('description', 'asc')->get();
        return $warehouse;
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
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Warehouse $warehouse, $id)
    // {
    //     $product = DB::table('request_products_to_warehouses')
    //     ->where('request_products_to_warehouses_id', $id)
    //     ->value('quantity_products');
    // // dd($product);
    // // Obtener el product_warehouses_id relacionado con la request_products_to_warehouses_id
    // // $productWarehouseId = DB::table('request_products_to_warehouses')
    // //     ->where('request_products_to_warehouses_id', $id)
    // //     ->value('product_warehouses_id');
    // // dd($productWarehouseId);

    // // $currentQuantityWarehouse = DB::table('product_warehouses')
    // //     ->where('product_warehouses_id', $productWarehouseId)
    // //     ->value('quantity');
    // // dd($currentQuantityWarehouse);

    // // $inventories_id = DB::table('product_warehouses')
    // //     ->where('product_warehouses_id', $productWarehouseId)
    // //     ->value('inventories_id');
    // // dd($inventories_id);

    // // $currentQuantityInventories = DB::table('inventories')
    // //     ->where('inventories_id', $inventories_id)
    // //     ->value('inWarehouse');
    // // dd($currentQuantityInventories);
    
    // // $currentQuantityInventoriesStock = DB::table('inventories')
    // //     ->where('inventories_id', $inventories_id)
    // //     ->value('stock');
    // // dd($currentQuantityInventoriesStock);

    // // if ($currentQuantityWarehouse !== null || $currentQuantityInventories !== null || $currentQuantityInventoriesStock !== null) {
    // //     // Realizar la resta
    // //     $newQuantityWarehouse = $currentQuantityWarehouse + $product;
    // //     $newQuiantityInventories = $currentQuantityInventories + $product;
    // //     $newQuiantityInventoriesStock = $currentQuantityInventoriesStock + $product;

    //     // Actualizar el valor de quantity en product_warehouses
    //     // DB::table('product_warehouses')
    //     //     ->where('product_warehouses_id', $productWarehouseId)
    //     //     ->update(['quantity' => $newQuantityWarehouse])
    //     ;
    //     // Actualizar el valor de quantity en inventories
    //     // DB::table('inventories')
    //     //     ->where('inventories_id', $inventories_id)
    //     //     ->update(['inWarehouse' => $newQuiantityInventories]);

    //     // Actualizar el valor de quantity en inventories Stock
    //     // DB::table('inventories')
    //     //     ->where('inventories_id', $inventories_id)
    //     //     ->update(['stock' => $newQuiantityInventoriesStock]);

    //     // return response([
    //     //     // "data" => $data,
    //     //     "message" => 'Producto Agregado Exitosamente.',
    //     //     "response" => 200,
    //     //     "success" => true,
    //     // ]);
    // // } else {
    // //     return response([
    // //         // "data" => $data,
    // //         "message" => 'Error: product_warehouses_id no encontrado.',
    // //         "response" => 404,
    // //         "success" => false,
    // //     ]);
    // // }

    // $resp = Warehouse::where('request_products_to_warehouses_id', $id)->delete();
    // if ($resp == 1) {
    //     return ([
    //         "messagge" => 'Producto eliminado exitosamente',
    //         "response" => '200',
    //         "success" => true,
    //     ]);
    // } else {
    //     return ([
    //         "messagge" => 'Producto ya eliminado',
    //         "response" => '500',
    //         "success" => false,
    //     ]);
    // }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
