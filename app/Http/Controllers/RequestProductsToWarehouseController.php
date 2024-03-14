<?php

namespace App\Http\Controllers;

use App\Models\request_complete_products;
use App\Models\request_products_to_warehouse;
use App\Models\ProductWarehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RequestProductsToWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $product = DB::table('request_products_to_warehouses')
            ->join('product_warehouses', 'request_products_to_warehouses.product_warehouses_id', '=', 'product_warehouses.product_warehouses_id')
            ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
            ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
            ->select('request_products_to_warehouses.request_products_to_warehouses_id', 'users.rol', 'request_products_to_warehouses.quantity_products', 'products.description as description_product', 'categories.Description as category_product', 'request_complete_products.detail as title_tour', 'request_complete_products.fecha as date_tour', 'products.buying_price as unitary_price', DB::raw('request_products_to_warehouses.quantity_products * products.buying_price as total_price'))
            ->where('users.id', '=', $userId)
            ->where('request_products_to_warehouses.status', '=', 'A')
            ->orderBy('category_product', 'asc')
            ->get();

        return $product;
    }
     
    public function indexRequesProductsAdm($userId)
    {
        $product = DB::table('request_products_to_warehouses')
            ->join('product_warehouses', 'request_products_to_warehouses.product_warehouses_id', '=', 'product_warehouses.product_warehouses_id')
            ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
            ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
            ->select('request_products_to_warehouses.request_products_to_warehouses_id', 'users.rol', 'request_products_to_warehouses.quantity_products', 'products.description as description_product', 'categories.Description as category_product', 'request_complete_products.detail as title_tour', 'request_complete_products.fecha as date_tour', 'products.buying_price as unitary_price', DB::raw('request_products_to_warehouses.quantity_products * products.buying_price as total_price'))
            ->where('users.id', '=', $userId)
            ->where('request_products_to_warehouses.status', '=', 'A')
            ->orderBy('category_product', 'asc')
            ->get();

        return $product;
    }

    public function updateStatus(Request $request, $requestCompleteProductsId)
    {
        try {
            DB::table('request_products_to_warehouses')
                ->where('request_complete_products_id', $requestCompleteProductsId)
                ->update(['status' => 'G']);

            return response([
                "message" => 'Estado actualizado exitosamente a G',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al actualizar el estado',
                "response" => 500,
                "success" => false,
            ]);
        }
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
        $data = $request->all();
        // Insertar datos en la tabla request_products_to_warehouse
        $res = request_products_to_warehouse::insert($data);
        if ($res == 1) {
            // Obtener el product_warehouses_id y quantity_products del formulario
            $productWarehouseId = $data['product_warehouses_id'];
            $quantityProducts = $data['quantity_products'];
            // Obtener el valor actual de quantity en product_warehouses
            $currentQuantityWarehouse = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('quantity');
            // dd($result);
            // dd($currentQuantityWarehouse, $quantityProducts);
            $inventories_id = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('inventories_id');
            // dd($inventories_id);
            $currentQuantityInventories = DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->value('inWarehouse');
            // dd($currentQuantityInventories);
            $currentQuantityInventoriesStock = DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->value('stock');
            // dd($currentQuantityInventoriesStock);
            if ($currentQuantityWarehouse !== null || $currentQuantityInventories !== null || $currentQuantityInventoriesStock !== null) {
                // Realizar la resta
                $newQuantityWarehouse = $currentQuantityWarehouse - $quantityProducts;
                $newQuiantityInventories = $currentQuantityInventories - $quantityProducts;
                $newQuiantityInventoriesStock = $currentQuantityInventoriesStock - $quantityProducts;
                // Actualizar el valor de quantity en product_warehouses
                DB::table('product_warehouses')
                    ->where('product_warehouses_id', $productWarehouseId)
                    ->update(['quantity' => $newQuantityWarehouse]);
                // Actualizar el valor de quantity en inventories
                DB::table('inventories')
                    ->where('inventories_id', $inventories_id)
                    ->update(['inWarehouse' => $newQuiantityInventories]);
                // Actualizar el valor de quantity en inventories Stock
                DB::table('inventories')
                    ->where('inventories_id', $inventories_id)
                    ->update(['stock' => $newQuiantityInventoriesStock]);
                return response([
                    "data" => $data,
                    "message" => 'Producto Agregado Exitosamente.',
                    "response" => 200,
                    "success" => true,
                ]);
            } else {
                return response([
                    "data" => $data,
                    "message" => 'Error: product_warehouses_id no encontrado.',
                    "response" => 404,
                    "success" => false,
                ]);
            }
        } else {
            return response([
                "data" => $data,
                "message" => 'Error Producto No Agregado.',
                "response" => 500,
                "success" => false,
            ]);
        }
    }
    
    public function addProductsAdm(Request $request)
    {
        $data = $request->all();
        // Insertar datos en la tabla request_products_to_warehouse
        $res = request_products_to_warehouse::insert($data);
        if ($res == 1) {
            // Obtener el product_warehouses_id y quantity_products del formulario
            $productWarehouseId = $data['product_warehouses_id'];
            $quantityProducts = $data['quantity_products'];
            // Obtener el valor actual de quantity en product_warehouses
            $currentQuantityWarehouse = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('quantity');
            // dd($result);
            // dd($currentQuantityWarehouse, $quantityProducts);
            $inventories_id = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('inventories_id');
            // dd($inventories_id);
            $currentQuantityInventories = DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->value('inWarehouse');
            // dd($currentQuantityInventories);
            $currentQuantityInventoriesStock = DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->value('stock');
            // dd($currentQuantityInventoriesStock);
            if ($currentQuantityWarehouse !== null || $currentQuantityInventories !== null || $currentQuantityInventoriesStock !== null) {
                // Realizar la resta
                $newQuantityWarehouse = $currentQuantityWarehouse - $quantityProducts;
                $newQuiantityInventories = $currentQuantityInventories - $quantityProducts;
                $newQuiantityInventoriesStock = $currentQuantityInventoriesStock - $quantityProducts;
                // Actualizar el valor de quantity en product_warehouses
                DB::table('product_warehouses')
                    ->where('product_warehouses_id', $productWarehouseId)
                    ->update(['quantity' => $newQuantityWarehouse]);
                // Actualizar el valor de quantity en inventories
                DB::table('inventories')
                    ->where('inventories_id', $inventories_id)
                    ->update(['inWarehouse' => $newQuiantityInventories]);
                // Actualizar el valor de quantity en inventories Stock
                DB::table('inventories')
                    ->where('inventories_id', $inventories_id)
                    ->update(['stock' => $newQuiantityInventoriesStock]);
                return response([
                    "data" => $data,
                    "message" => 'Producto Agregado Exitosamente.',
                    "response" => 200,
                    "success" => true,
                ]);
            } else {
                return response([
                    "data" => $data,
                    "message" => 'Error: product_warehouses_id no encontrado.',
                    "response" => 404,
                    "success" => false,
                ]);
            }
        } else {
            return response([
                "data" => $data,
                "message" => 'Error Producto No Agregado.',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    public function generateOrder(Request $request)
    {

        $data = $request->all();
        $res = request_complete_products::insert($data);

        if ($res == 1) {
            // Obtener el ID recién generado
            $newRequestId = DB::getPdo()->lastInsertId();

            return response([
                "data" => $data,
                "request_complete_products_id" => $newRequestId,
                "message" => 'Pedido Generado Exitosamente.',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Error Al Generar Pedido.',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    public function generateOrderAdm(Request $request)
    {
        $data = $request->all();
        $res = request_complete_products::insert($data);

        if ($res == 1) {
            // Obtener el ID recién generado
            $newRequestId = DB::getPdo()->lastInsertId();

            return response([
                "data" => $data,
                "request_complete_products_id" => $newRequestId,
                "message" => 'Pedido Generado Exitosamente.',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Error Al Generar Pedido.',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\request_products_to_warehouse  $request_products_to_warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(request_products_to_warehouse $request_products_to_warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\request_products_to_warehouse  $request_products_to_warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(request_products_to_warehouse $request_products_to_warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\request_products_to_warehouse  $request_products_to_warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, request_products_to_warehouse $request_products_to_warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\request_products_to_warehouse  $request_products_to_warehouse
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = DB::table('request_products_to_warehouses')
            ->where('request_products_to_warehouses_id', $id)
            ->value('quantity_products');
        // dd($product);
        // Obtener el product_warehouses_id relacionado con la request_products_to_warehouses_id
        $productWarehouseId = DB::table('request_products_to_warehouses')
            ->where('request_products_to_warehouses_id', $id)
            ->value('product_warehouses_id');
        // dd($productWarehouseId);
        $currentQuantityWarehouse = DB::table('product_warehouses')
            ->where('product_warehouses_id', $productWarehouseId)
            ->value('quantity');
        // dd($currentQuantityWarehouse);
        $inventories_id = DB::table('product_warehouses')
            ->where('product_warehouses_id', $productWarehouseId)
            ->value('inventories_id');
        // dd($inventories_id);
        $currentQuantityInventories = DB::table('inventories')
            ->where('inventories_id', $inventories_id)
            ->value('inWarehouse');
        // dd($currentQuantityInventories);
        $currentQuantityInventoriesStock = DB::table('inventories')
            ->where('inventories_id', $inventories_id)
            ->value('stock');
        // dd($currentQuantityInventoriesStock);
        if ($currentQuantityWarehouse !== null || $currentQuantityInventories !== null || $currentQuantityInventoriesStock !== null) {
            // Realizar la resta
            $newQuantityWarehouse = $currentQuantityWarehouse + $product;
            $newQuiantityInventories = $currentQuantityInventories + $product;
            $newQuiantityInventoriesStock = $currentQuantityInventoriesStock + $product;
            // Actualizar el valor de quantity en product_warehouses
            DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->update(['quantity' => $newQuantityWarehouse]);
            // Actualizar el valor de quantity en inventories
            DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->update(['inWarehouse' => $newQuiantityInventories]);
            // Actualizar el valor de quantity en inventories Stock
            DB::table('inventories')
                ->where('inventories_id', $inventories_id)
                ->update(['stock' => $newQuiantityInventoriesStock]);
            // return response([
            //     // "data" => $data,
            //     "message" => 'Producto Agregado Exitosamente.',
            //     "response" => 200,
            //     "success" => true,
            // ]);
        } else {
            return response([
                // "data" => $data,
                "message" => 'Error: product_warehouses_id no encontrado.',
                "response" => 404,
                "success" => false,
            ]);
        }

        $resp = request_products_to_warehouse::where('request_products_to_warehouses_id', $id)->delete();
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
