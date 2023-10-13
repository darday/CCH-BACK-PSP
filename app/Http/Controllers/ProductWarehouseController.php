<?php

namespace App\Http\Controllers;

use App\Models\ProductWarehouse;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductWarehouseController extends Controller
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

    public function addObservation($id, Request $request)
    {

        // return($request);
        $query = DB::table('product_warehouses')
            ->where('product_warehouses_id', $id)
            ->update([
                'observation' => $request->observation,
                'updated_at' => Carbon::now()
            ]);

        if ($query == 1) {
            return response([
                // "data" => $data,
                "messagge" => 'Observación Agregada',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                // "data" => $data,
                "messagge" => 'Error, no se ha agregado observación.',
                "response" => 200,
                "success" => false,
            ]);
        }
    }

    public function productsInWarehouse($id)
    {
        $product = DB::table('warehouses')
            ->join('product_warehouses', 'product_warehouses.warehouse_id', '=', 'warehouses.warehouse_id')
            // ->join('inventories', 'inventories.product_id', '=', 'product_warehouses.product_id')
            ->join('inventories', function (JoinClause $join) {
                $join->on('inventories.product_id', '=', 'product_warehouses.product_id')
                    ->on('inventories.status_id', '=', 'product_warehouses.product_status_id');
            })
            ->join('products', 'products.product_id', '=', 'inventories.product_id')
            ->join('categories', 'categories.categories_id', '=', 'products.category_id')
            ->join('statuses', 'statuses.status_id', '=', 'inventories.status_id')
            ->select('warehouses.warehouse_id as warehouse_id', 'warehouses.description as warehouse', 'product_warehouses.quantity as quantity', 'products.product_id as product_id', 'products.description as product', 'inventories.status_id as status_id', 'statuses.description as status', 'product_warehouses.observation', 'product_warehouses.product_warehouses_id')
            // ->orderBy('products.description')
            ->where('warehouses.warehouse_id', '=', $id)
            ->get();

        return $product;
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
        // UPDATE INVENTORY
        $stock = DB::table('inventories')
            // ->select('stock')
            ->where('product_id', '=', $request->product_id)
            ->where('status_id', '=', $request->product_status_id)
            ->get();
        $data = json_decode($stock, true);


        $inWarehouse = $data[0]['inWarehouse'] + $request->quantityToMove;
        $withoutWarehouse = $data[0]['withoutWarehouse'] - $request->quantityToMove;

        $updateInventory = DB::table('inventories')
            ->where('product_id', $request->product_id)
            ->where('status_id', '=', $request->product_status_id)
            ->update(['inWarehouse' => $inWarehouse, 'withoutWarehouse' => $withoutWarehouse]);

        // ADD PRODUCT TO WAREHOUSE

        $productWarhouseExist = DB::table('product_warehouses')
            ->where('product_id', '=', $request->product_id)
            ->where('warehouse_id', '=', $request->warehouse_id)
            ->where('product_status_id', '=', $request->product_status_id)
            ->get();
        $productWarhouseExist = json_decode($productWarhouseExist, true);
        if (count($productWarhouseExist) == 0) {
            $query = DB::table('product_warehouses')->insert([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'quantity' => $request->quantityToMove,
                'product_status_id' => $request->product_status_id,
                'observation' => $request->observation,
            ]);
            $message = "Producto Agregado Exitosamente";
        } else {
            $quantityUpdated = $productWarhouseExist[0]['quantity'] + $request->quantityToMove;
            $query = DB::table('product_warehouses')
                ->where('product_id', $request->product_id)
                ->where('warehouse_id', '=', $request->warehouse_id)
                ->where('product_status_id', '=', $request->product_status_id)
                ->update([
                    'quantity' => $quantityUpdated,
                    'observation' => $request->observation,
                ]);
            $message = "Producto Actualizado Exitosamente";
        }


        if ($query == 1) {
            return response([
                // "data" => $data,
                "messagge" => $message,
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                // "data" => $data,
                "messagge" => $message,
                "response" => 200,
                "success" => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductWarehouse  $productWarehouse
     * @return \Illuminate\Http\Response
     */
    public function show(ProductWarehouse $productWarehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductWarehouse  $productWarehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductWarehouse $productWarehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductWarehouse  $productWarehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductWarehouse $productWarehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductWarehouse  $productWarehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductWarehouse $productWarehouse, $id)
    {
        $findProductInWarehouse = DB::table('product_warehouses')
            ->where('product_warehouses_id', '=', $id)
            ->get();
        $findProductInWarehouse = json_decode($findProductInWarehouse, true);

        $findProductInInventory = DB::table('inventories')
            ->where('product_id', $findProductInWarehouse[0]['product_id'])
            ->where('status_id', '=', $findProductInWarehouse[0]['product_status_id'])
            ->get();
        $findProductInInventory = json_decode($findProductInInventory, true);

        $updateInventory = DB::table('inventories')
            ->where('product_id', $findProductInWarehouse[0]['product_id'])
            ->where('status_id', '=', $findProductInWarehouse[0]['product_status_id'])
            ->update([
                'withoutWarehouse' => $findProductInInventory[0]['withoutWarehouse'] + $findProductInWarehouse[0]['quantity'],
                'inWarehouse' => $findProductInInventory[0]['inWarehouse'] - $findProductInWarehouse[0]['quantity']
                
            ]);

        $resp = ProductWarehouse::where('product_warehouses_id', $id)->delete();
        if ($resp == 1) {
            return ([
                "messagge" => 'Producto eliminado exitosamente',
                "response" => '200',
                "success" => true,
            ]);
        } else {
            return ([
                "messagge" => 'Producto ya eliminado',
                "response" => '500',
                "success" => false,
            ]);
        }
    }
}
