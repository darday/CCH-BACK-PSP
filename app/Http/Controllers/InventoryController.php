<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInventoryById($id)
    {
        $inventory = DB::table('inventories')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
            ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
            ->select(
                'inventories.inventories_id',
                'inventories.stock',
                'products.description as product',
                'products.product_id as product_id',
                'products.rent_price as rent_price',
                'products.img as img',
                'categories.description as category',
                'statuses.description as status',
                'statuses.status_id as status_id',
                'inventories.inWarehouse',
                'inventories.withoutWarehouse',
                'suppliers.name_store',
                'inventories.*'
            )
            ->orderBy('products.description', 'asc')
            ->orderBy('statuses.description', 'asc')
            ->where('inventories_id', '=', $id)
            ->get();

        return $inventory;
    }



    // public function index()
    // {
    //     // $inventory = DB::table('products')
    //     //     ->join('categories', 'products.category_id', '=', 'categories.categories_id')
    //     //     ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
    //     //     ->select('suppliers.name_store as supplier', 'categories.description as category', 'products.*')
    //     //     ->orderBy('products.description')
    //     //     ->get();
    //     $inventory = DB::table('inventories')
    //         ->join('products', 'inventories.product_id', '=', 'products.product_id')
    //         ->join('categories', 'products.category_id', '=', 'categories.categories_id')
    //         ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
    //         ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
    //         ->select('inventories.inventories_id', 'inventories.stock', 'products.description as product', 'products.product_id as product_id',  'categories.description as category', 'statuses.description as status', 'statuses.status_id as status_id', 'inventories.inWarehouse', 'inventories.withoutWarehouse', 'suppliers.name_store', 'inventories.*')
    //         ->orderBy('products.description', 'asc')
    //         ->orderBy('statuses.description', 'asc')
    //         ->get();

    //     return $inventory;
    // }

    public function index()
    {
        $inventory = DB::table('inventories')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
            ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
            ->select('inventories.inventories_id', 'products.product_id', 'products.buying_price as unit_price_product', 'inventories.stock', 'products.description as product', 'products.product_id as product_id',  'categories.description as category', 'statuses.description as status', 'statuses.status_id as status_id', 'inventories.inWarehouse', 'inventories.withoutWarehouse', 'suppliers.name_store', 'inventories.*', DB::raw('inventories.stock * products.buying_price as total_price'))
            ->orderBy('products.description', 'asc')
            ->orderBy('statuses.description', 'asc')
            ->get();

        return $inventory;
    }

    public function inventorieQuiantityInWarehouses($id)
    {
        $inventory = DB::table('inventories')
            ->join('product_warehouses', 'inventories.inventories_id', '=', 'product_warehouses.inventories_id')
            ->join('warehouses', 'product_warehouses.warehouse_id', '=', 'warehouses.warehouse_id')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->select('product_warehouses.product_warehouses_id', 'product_warehouses.quantity', 'inventories.inventories_id', 'inventories.stock', 'inventories.withoutWarehouse', 'warehouses.warehouse_id', 'warehouses.description', 'products.description as nombreProducto')
            ->where('inventories.inventories_id', $id)

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
            } else {
                $messagge = "No se puede actualizar el producto al mismo estado";
                $query = 0;
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

    public function updateWarehouseStatusAndQuantity($inventoriesId, $productsId)
    {
        return 'david paca';
    }

    public function updateWarehousesStatesQuantity(Request $request, $inventoriesId, $productsId)
    {
        $data = $request->all();
        // Acceder al dato de stock
        if (isset($data['stock'])) {
            $stockSend = $data['stock'];
            // var_dump('Valor de stock:', $stock);
        }
        if (isset($data['status_id'])) {
            $statusIdSend = $data['status_id'];
            echo 'Valor de status_id:', $statusIdSend, '<br>';
        }
        if (isset($data['warehouse_id'])) {
            $warehouseIdSend = $data['warehouse_id'];
            echo 'Valor de wareHOUSE:', $warehouseIdSend, '<br>';
        }
        // Verificar si existe un registro con el status_id igual a $statusIdSend
        $existsStatusId = DB::table('inventories')
            ->where('product_id', $productsId)
            ->where('status_id', $statusIdSend)
            ->exists();
        // echo 'Valor EXISTENTE:::', $existsStatusId, '<br>';

        if (!$existsStatusId) {
            // Si $statusIdSend no está definido, crea un nuevo registro en la tabla 'inventories'
            $newInventoryId = DB::table('inventories')->insertGetId([
                'product_id' => $productsId,
                'stock' => $stockSend,
                'withoutWarehouse' => 0,
                'inWarehouse' => $stockSend,
                'status_id' => $statusIdSend, // Como $statusIdSend no está definido, asignamos NULL
                'created_at' => now(), // Asignar la fecha y hora actual como valor de created_at
                'updated_at' => now()  // Asignar la fecha y hora actual como valor de updated_at
            ]);
            // Verifica si se insertó correctamente el nuevo registro
            if ($newInventoryId) {
                echo 'Se insertó un nuevo registro en inventories con ID:', $newInventoryId, '<br>';
            } else {
                echo 'Error al insertar el nuevo registro en inventories<br>';
            }
            //OBTENIENDO ID DE INVENTORIES PARA LA INSERCION EN PRODUCT WAREHOUSE
            $getNewInventoriesIdToPW = DB::table('inventories')
                // ->where('inventories.product_id', $productsId)
                ->where('inventories.status_id', $statusIdSend)
                ->value('inventories_id');
            echo 'Valor de de NEW INVENTORIES ID PARA PRODUCT WAREHOUSE:', $getNewInventoriesIdToPW, '<br>';
            // INSERCION EN PRODUCT WAREHOUSE
            $newProductWarehouse = DB::table('product_warehouses')->insertGetId([
                'inventories_id' => $getNewInventoriesIdToPW,
                'warehouse_id' => $warehouseIdSend,
                'quantity' => $stockSend,
                'created_at' => now(), // Asignar la fecha y hora actual como valor de created_at
                'updated_at' => now()  // Asignar la fecha y hora actual como valor de updated_at
            ]);
            if ($newProductWarehouse) {
                echo 'Se insertó un nuevo registro en PRODUCT WAREHOUSE con ID:', $newProductWarehouse, '<br>';
            } else {
                echo 'Error al insertar el nuevo registro en PRODUCT WAREHOUS<br>';
            }
            $inventoryProductStock = DB::table('inventories')
                // ->join('products', 'inventories.product_id', '=', 'products.product_id')
                ->where('inventories.inventories_id', $inventoriesId)
                ->where('inventories.product_id', $productsId)
                ->value('stock');
            // return $inventoryProductStock;
            $inventoryProductInWarehouse = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->where('product_id', $productsId)
                ->value('inWarehouse');
            // // return $inventoryProductInWarehouse;
            $productWarehouseQuantity = DB::table('product_warehouses')
                ->where('inventories_id', $inventoriesId)
                ->value('quantity');
            // return $productWarehouseQuantity;
            if ($inventoryProductStock !== null || $inventoryProductInWarehouse !== null || $productWarehouseQuantity !== null) {
                //     // Realizar la Restas
                $newQuiantityInventoriesStock = $inventoryProductStock - $stockSend;
                // var_dump('Valor de la resta de STOCK:', $newQuiantityInventoriesStock);
                $newQuiantityInventoriesInWarehouse = $inventoryProductInWarehouse - $stockSend;
                // var_dump('Valor de la resta de INWAREHOUSE:', $newQuiantityInventoriesInWarehouse);
                $newQuiantityProductWarehouse = $productWarehouseQuantity - $stockSend;
                var_dump('Valor de la resta de QUIANTITY PRODUCT_WAREHOUSES:', $newQuiantityProductWarehouse);
                // Actualizar el valor de STOCK: 
                DB::table('inventories')
                    ->where('inventories_id', $inventoriesId)
                    ->where('product_id', $productsId)
                    ->update(['stock' => $newQuiantityInventoriesStock]);
                // Actualizar el valor de IN WAREHOUSE: 
                DB::table('inventories')
                    ->where('inventories_id', $inventoriesId)
                    ->where('product_id', $productsId)
                    ->update(['inWarehouse' => $newQuiantityInventoriesInWarehouse]);
                // Actualizar el valor de QUANTITY - PRODUCT WAREHOUSE: 
                DB::table('product_warehouses')
                    ->where('inventories_id', $inventoriesId)
                    // ->where('product_id', $productsId)
                    ->update(['quantity' => $newQuiantityProductWarehouse]);
            }
        } else {
            $inventoryProductStock = DB::table('inventories')
                // ->join('products', 'inventories.product_id', '=', 'products.product_id')
                ->where('inventories.inventories_id', $inventoriesId)
                ->where('inventories.product_id', $productsId)
                ->value('stock');
            // return $inventoryProductStock;
            $inventoryProductInWarehouse = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->where('product_id', $productsId)
                ->value('inWarehouse');
            // // return $inventoryProductInWarehouse;
            $productWarehouseQuantity = DB::table('product_warehouses')
                ->where('inventories_id', $inventoriesId)
                ->value('quantity');
            // return $productWarehouseQuantity;
            if ($inventoryProductStock !== null || $inventoryProductInWarehouse !== null || $productWarehouseQuantity !== null) {
                //     // Realizar la Restas
                $newQuiantityInventoriesStock = $inventoryProductStock - $stockSend;
                // var_dump('Valor de la resta de STOCK:', $newQuiantityInventoriesStock);
                $newQuiantityInventoriesInWarehouse = $inventoryProductInWarehouse - $stockSend;
                // var_dump('Valor de la resta de INWAREHOUSE:', $newQuiantityInventoriesInWarehouse);
                $newQuiantityProductWarehouse = $productWarehouseQuantity - $stockSend;
                var_dump('Valor de la resta de QUIANTITY PRODUCT_WAREHOUSES:', $newQuiantityProductWarehouse);
                // Actualizar el valor de STOCK: 
                DB::table('inventories')
                    ->where('inventories_id', $inventoriesId)
                    ->where('product_id', $productsId)
                    ->update(['stock' => $newQuiantityInventoriesStock]);
                // Actualizar el valor de IN WAREHOUSE: 
                DB::table('inventories')
                    ->where('inventories_id', $inventoriesId)
                    ->where('product_id', $productsId)
                    ->update(['inWarehouse' => $newQuiantityInventoriesInWarehouse]);
                // Actualizar el valor de QUANTITY - PRODUCT WAREHOUSE: 
                DB::table('product_warehouses')
                    ->where('inventories_id', $inventoriesId)
                    // ->where('product_id', $productsId)
                    ->update(['quantity' => $newQuiantityProductWarehouse]);
                $sumInventoryStatusId1 = DB::table('inventories')
                    ->where('inventories.product_id', $productsId)
                    ->where('inventories.status_id', $statusIdSend)
                    ->value('stock');
                echo 'Valor de STOCK según las condiciones:', $sumInventoryStatusId1, '<br>';
                $sumInventoryStatusId2 = DB::table('inventories')
                    ->where('inventories.product_id', $productsId)
                    ->where('inventories.status_id', $statusIdSend)
                    ->value('inWarehouse');
                echo 'Valor de IN WAREHOUSE según las condiciones:', $sumInventoryStatusId2, '<br>';
                if ($sumInventoryStatusId1 !== null || $sumInventoryStatusId2 !== null) {
                    $newSumInventoryStatusId1 = $sumInventoryStatusId1 + $stockSend;
                    var_dump('Valor de la suma de STOCK:', $newSumInventoryStatusId1);
                    $newSumInventoryStatusId2 =  $sumInventoryStatusId2 + $stockSend;
                    var_dump('Valor de la suma de IN WAREHOUSE:', $newSumInventoryStatusId2);
                    DB::table('inventories')
                        ->where('status_id', $statusIdSend)
                        ->update(['stock' => $newSumInventoryStatusId1]);
                    // Actualizar el valor de IN WAREHOUSE: 
                    DB::table('inventories')
                        ->where('status_id', $statusIdSend)
                        ->update(['inWarehouse' => $newSumInventoryStatusId2]);
                    // OBTENIENDO EL NUEVO ID DE INVENTORIES ID: 
                    $getNewInventoriesId = DB::table('inventories')
                        // ->where('inventories.product_id', $productsId)
                        ->where('inventories.status_id', $statusIdSend)
                        ->value('inventories_id');
                    echo 'Valor de de NEW INVENTORIES ID:', $getNewInventoriesId, '<br>';
                    // OBTENIENDO VALOR DE QUIANTITY EN PRODUCT WAREHOUSE: 
                    $sumProductWarehouseStatus = DB::table('product_warehouses')
                        // ->where('inventories.product_id', $productsId)
                        ->where('product_warehouses.inventories_id', $getNewInventoriesId)
                        ->value('quantity');
                    echo 'Valor de de QUANTITY:', $sumProductWarehouseStatus, '<br>';
                    if ($sumProductWarehouseStatus !== null) {
                        $newSumProductWarehouseStatus = $sumProductWarehouseStatus + $stockSend;
                        echo 'Valor de de NEW QUANTITY SUMA:', $newSumProductWarehouseStatus, '<br>';
                        // Actualizar el valor de IN WAREHOUSE: 
                        DB::table('product_warehouses')
                            ->where('inventories_id', $getNewInventoriesId)
                            ->update(['quantity' => $newSumProductWarehouseStatus]);
                    }
                }
                // }
            } else {
                return response([
                    // "data" => $data,
                    "message" => 'Error: No encontrado VALOR.',
                    "response" => 404,
                    "success" => false,
                ]);
            }
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
