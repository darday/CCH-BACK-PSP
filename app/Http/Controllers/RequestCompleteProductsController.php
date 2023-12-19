<?php

namespace App\Http\Controllers;

use App\Models\request_complete_products;
use App\Models\request_products_to_warehouse;
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
            ->select('request_complete_products.request_complete_products_id', 'users.name', 'users.last_name', 'request_complete_products.detail', 'request_complete_products.fecha', 'request_complete_products.status_acquisition')
            ->where('users.id', '=', $id)
            ->where('request_complete_products.status_request', '=', 'finalizado')
            // ->orderBy('products.description')
            ->get();

        return $request_complete;
    }

    public function indexAdm()
    {
        $request_complete = DB::table('request_complete_products')
            ->join('users', 'request_complete_products.user_id', '=', 'users.id')
            ->select('request_complete_products.request_complete_products_id', 'users.name', 'users.last_name', 'users.rol', 'request_complete_products.detail', 'request_complete_products.fecha', 'request_complete_products.status_acquisition')
            // ->where('users.id', '=', $id)
            ->where('request_complete_products.status_request', '=', 'finalizado')
            ->where(function ($query) {
                $query->where('request_complete_products.status_acquisition', '=', 'listo')
                    ->orWhere('request_complete_products.status_acquisition', '=', 'pendiente');
            })
            ->orderBy('request_complete_products.fecha', 'desc')
            ->get();

        return $request_complete;
    }

    public function indexListRejectedRetiredAdm()
    {
        $request_complete = DB::table('request_complete_products')
            ->join('users', 'request_complete_products.user_id', '=', 'users.id')
            ->select('request_complete_products.request_complete_products_id', 'users.name', 'users.last_name', 'users.rol', 'request_complete_products.detail', 'request_complete_products.fecha', 'request_complete_products.status_acquisition')
            // ->where('users.id', '=', $id)
            ->where('request_complete_products.status_request', '=', 'finalizado')
            ->where(function ($query) {
                $query->where('request_complete_products.status_acquisition', '=', 'retirada')
                    ->orWhere('request_complete_products.status_acquisition', '=', 'rechazada');
            })
            ->get();

        return $request_complete;
    }

    public function productsListGuide($requestCompleteProductsId, $userId)
    {
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
            ->where('users.id', '=', $userId)
            ->where('request_complete_products.request_complete_products_id', '=', $requestCompleteProductsId)
            ->get();
        return $products;
    }

    public function productsListGuideAdm($requestCompleteProductsId, $userId)
    {
        $products = DB::table('request_products_to_warehouses')
            ->join('product_warehouses', 'request_products_to_warehouses.product_warehouses_id', '=', 'product_warehouses.product_warehouses_id')
            ->join('inventories', 'product_warehouses.inventories_id', '=', 'inventories.inventories_id')
            ->join('products', 'inventories.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('users', 'request_products_to_warehouses.user_id', '=', 'users.id')
            ->join('request_complete_products', 'request_products_to_warehouses.request_complete_products_id', '=', 'request_complete_products.request_complete_products_id')
            ->select(
                'request_products_to_warehouses.request_products_to_warehouses_id',
                'request_complete_products.request_complete_products_id',
                'users.id',
                'users.rol',
                'request_products_to_warehouses.quantity_products',
                'products.description as description_product',
                'categories.description as category_product',
                'products.selling_price as unitary_price',
                'request_complete_products.detail as detail_title',
                'request_complete_products.status_acquisition',
                DB::raw('request_products_to_warehouses.quantity_products * products.selling_price as total_price')
            )
            // ->where('users.id', '=', $userId)
            ->where('request_complete_products.request_complete_products_id', '=', $requestCompleteProductsId)
            ->get();
        return $products;
    }

    public function productsListTitle($requestProductTitle)
    {
        $requestDetail = DB::table('request_complete_products')
            ->select('detail', 'fecha')
            ->where('request_complete_products_id', $requestProductTitle)
            ->get();

        return $requestDetail;
    }

    public function updateStatusRequestHistory(Request $request, $requestCompleteId)
    {
        try {
            DB::table('request_complete_products')
                ->where('request_complete_products_id', $requestCompleteId)
                ->update(['status_request' => 'finalizado']);

            return response([
                "message" => 'Estado actualizado exitosamente a FINALIZADO',
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

    public function updateStatusRequestHistoryAdm(Request $request, $requestCompleteId)
    {
        try {
            DB::table('request_complete_products')
                ->where('request_complete_products_id', $requestCompleteId)
                ->update(['status_acquisition' => 'listo']);

            return response([
                "message" => 'Estado actualizado exitosamente a LISTO PARA RETIRAR',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al actualizar el estado LISTO PARA RETIRAR',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    public function updateStatusProductsRetiredHistoryAdm(Request $request, $requestCompleteId)
    {
        try {
            DB::table('request_complete_products')
                ->where('request_complete_products_id', $requestCompleteId)
                ->update(['status_acquisition' => 'retirada']);

            return response([
                "message" => 'Estado actualizado exitosamente a RETIRADA',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al actualizar el estado RETIRADA',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    // public function statusRequestHistory($requestProductStatus)
    // {
    //     $product = DB::table('request_complete_products')
    //     ->where('request_complete_products_id', $requestProductStatus)        
    //     ->value('status_request');        
    //     return $product;
    // }

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
    // public function destroy($id)
    // {
    //     $resp = request_complete_products::where('request_complete_products_id', $id)->delete();
    //     if ($resp == 1) {
    //         return ([
    //             "messagge" => 'Solicitud eliminada exitosamente',
    //             "response" => '200',
    //             "success" => true,
    //         ]);
    //     } else {
    //         return ([
    //             "messagge" => 'Solicitud ya eliminada',
    //             "response" => '500',
    //             "success" => false,
    //         ]);
    //     }
    // }
 

    public function destroy($requestCompleteProductsId)
    {

        // Obtener los productos relacionados con la solicitud
        $products = DB::table('request_products_to_warehouses')
            ->where('request_complete_products_id', $requestCompleteProductsId)
            ->get();

        // Iterar sobre cada producto y realizar la suma
        foreach ($products as $product) {
            $productWarehouseId = $product->product_warehouses_id;
            $quantityToAdd = $product->quantity_products;

            // Obtener valores actuales de las tablas
            $currentQuantityWarehouse = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('quantity');

            $inventoriesId = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('inventories_id');

            $currentQuantityInventories = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->value('inWarehouse');

            $currentQuantityInventoriesStock = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->value('stock');

            // Realizar la suma
            $newQuantityWarehouse = $currentQuantityWarehouse + $quantityToAdd;
            $newQuantityInventories = $currentQuantityInventories + $quantityToAdd;
            $newQuantityInventoriesStock = $currentQuantityInventoriesStock + $quantityToAdd;

            // Actualizar los valores en las tablas
            DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->update(['quantity' => $newQuantityWarehouse]);

            DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->update(['inWarehouse' => $newQuantityInventories, 'stock' => $newQuantityInventoriesStock]);
        }
        try {
            request_complete_products::where('request_complete_products_id', $requestCompleteProductsId)->delete();
            request_products_to_warehouse::where('request_complete_products_id', $requestCompleteProductsId)->delete();
            return response([
                "message" => 'Solicitud eliminada exitosamente de TOUR y PRODUCTOS',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al eliminar TOUR y PRODUCTOS',
                "response" => 500,
                "success" => false,
            ]);
        }

    }

    public function upDateProductsWithdrawalWarehouse($requestCompleteProductsId)
    {
        // Obtener los productos relacionados con la solicitud
        $products = DB::table('request_products_to_warehouses')
            ->where('request_complete_products_id', $requestCompleteProductsId)
            ->get();

        // Iterar sobre cada producto y realizar la suma
        foreach ($products as $product) {
            $productWarehouseId = $product->product_warehouses_id;
            $quantityToAdd = $product->quantity_products;

            // Obtener valores actuales de las tablas
            $currentQuantityWarehouse = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('quantity');

            $inventoriesId = DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->value('inventories_id');

            $currentQuantityInventories = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->value('inWarehouse');

            $currentQuantityInventoriesStock = DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->value('stock');

            // Realizar la suma
            $newQuantityWarehouse = $currentQuantityWarehouse + $quantityToAdd;
            $newQuantityInventories = $currentQuantityInventories + $quantityToAdd;
            $newQuantityInventoriesStock = $currentQuantityInventoriesStock + $quantityToAdd;

            // Actualizar los valores en las tablas
            DB::table('product_warehouses')
                ->where('product_warehouses_id', $productWarehouseId)
                ->update(['quantity' => $newQuantityWarehouse]);

            DB::table('inventories')
                ->where('inventories_id', $inventoriesId)
                ->update(['inWarehouse' => $newQuantityInventories, 'stock' => $newQuantityInventoriesStock]);
        }

        try {
            DB::table('request_products_to_warehouses')
                ->where('request_complete_products_id', $requestCompleteProductsId)
                ->update(['status' => 'R']);

            DB::table('request_complete_products')
                ->where('request_complete_products_id', $requestCompleteProductsId)
                ->update(['status_acquisition' => 'rechazada']);

            return response([
                "message" => 'Estado actualizado exitosamente a R y en estado RECHAZADA',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al actualizar el estados',
                "response" => 500,
                "success" => false,
            ]);
        }
    }
}
