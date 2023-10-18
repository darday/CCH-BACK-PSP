<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $inventory = DB::table('products')
        //     ->join('categories', 'products.category_id', '=', 'categories.categories_id')
        //     ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
        //     ->select('suppliers.name_store as supplier', 'categories.description as category', 'products.*')
        //     ->orderBy('products.description')
        //     ->get();
        $inventory = DB::table('inventories')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
            ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
            ->select('inventories.inventories_id', 'inventories.stock', 'products.description as product', 'products.product_id as product_id',  'categories.description as category', 'statuses.description as status', 'statuses.status_id as status_id', 'inventories.inWarehouse', 'inventories.withoutWarehouse', 'suppliers.name_store','inventories.*')
            ->orderBy('products.description', 'asc')
            ->orderBy('statuses.description', 'asc')
            ->get();

        return $inventory;
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

        $inWarehouse = 0;
        $withoutWarehouse = $request->stock;

        $serchProduct = DB::table('inventories')
            ->where('product_id', '=', $request->product_id)
            ->where('status_id', '=', $request->status_id)
            ->get();

        $productFinded = json_decode($serchProduct, true);

        if (count($serchProduct) == 0) {
            $query = DB::table('inventories')->insert([
                'product_id' => $request->product_id,
                'stock' => $request->stock,
                'inWarehouse' => $inWarehouse,
                'withoutWarehouse' => $withoutWarehouse,
                'Observation' => $request->Observation,
                'status_id' => $request->status_id,
            ]);

            $messagge = "Producto Agregado a Inventario";
        } else {
            $query = DB::table('inventories')
                ->where('product_id', $request->product_id)
                ->where('status_id', '=', $request->status_id)
                ->update([
                    'stock' => $productFinded[0]['stock'] + $request->stock,
                    'withoutWarehouse' => $productFinded[0]['withoutWarehouse'] + $request->stock,
                ]);
            $messagge = "Producto Actualizado Exitosamente";
        }

        if ($query == 1) {
            return response([
                // "data" => $data,
                "messagge" => $messagge,
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                // "data" => $data,
                "messagge" => "No se ha agregado el producto al Inventario",
                "response" => 200,
                "success" => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        // return($request->inventories_id);
        $productSelected = DB::table('inventories')
            ->where('inventories_id', '=', $request->inventories_id)
            ->get();
        $productSelected = json_decode($productSelected, true);

        $productId = $productSelected[0]['product_id'];
        $statusId = $productSelected[0]['status_id'];
        $withoutWarehouse = $productSelected[0]['withoutWarehouse'];
        // return ($productSelected);

        if ($withoutWarehouse <= 0 || $request->quantity  > $withoutWarehouse) {
            return response([
                // "data" => $data,
                "messagge" => "No existe productos en bodega o la cantidad de productos a cambiar de estado es superior a los productos que están en bodega",
                "response" => 200,
                "success" => true,
            ]);
        }

        $findProductoExist = DB::table('inventories')
            ->where('product_id', '=', $productId)
            ->where('status_id', '=', $request->status_id)
            ->get();


        if (count($findProductoExist) > 0) {
            $findProductoExist = json_decode($findProductoExist, true);

            if ($productId == $findProductoExist[0]['product_id'] && $statusId != $request->status_id) {
                $query = DB::table('inventories')
                    ->where('inventories_id', $request->inventories_id)
                    ->update([
                        'withoutWarehouse' => $productSelected[0]['withoutWarehouse'] - $request->quantity,
                        'stock' => $productSelected[0]['stock'] - $request->quantity,
                    ]);

                $findStock = DB::table('inventories')   //find stock of product with the new status_id
                    ->where('product_id', '=', $productId)
                    ->where('status_id', '=', $request->status_id)
                    ->get();
                $findStock = json_decode($findStock, true);


                // return ($findStock[0]['stock']);
                $query2 = DB::table('inventories')
                    ->where('product_id', $productSelected[0]['product_id'])
                    ->where('status_id', $request->status_id)
                    ->update([
                        'withoutWarehouse' => $findStock[0]['withoutWarehouse'] + $request->quantity,
                        'stock' => $findStock[0]['stock'] + $request->quantity,
                    ]);

                $messagge = "Producto Actualizado Exitosamente";
            }else{
                $messagge = "No se puede actualizar el producto al mismo estado";
                $query = 1;
            }
        } else {
            $query1 = DB::table('inventories')
                    ->where('inventories_id', $request->inventories_id)
                    ->update([
                        'withoutWarehouse' => $productSelected[0]['withoutWarehouse'] - $request->quantity,
                        'stock' => $productSelected[0]['stock'] - $request->quantity,
                    ]); 

            $query = DB::table('inventories')->insert([
                'product_id' => $productSelected[0]['product_id'],
                'stock' => $request->quantity,
                'inWarehouse' => 0,
                'withoutWarehouse' => $request->quantity,
                'Observation' => 'Creada a partir de editar inventario',
                'status_id' => $request->status_id,
            ]);
            $messagge = "El producto se ha creado";
        }

        if ($query == 1) {
            return response([
                // "data" => $data,
                "messagge" => $messagge,
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                // "data" => $data,
                "messagge" => "No se ha modificado el producto al Inventario",
                "response" => 200,
                "success" => false,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
