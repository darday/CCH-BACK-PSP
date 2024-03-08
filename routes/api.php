<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentRentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonthlyTourController;
use App\Http\Controllers\PassengerListMonthlyTourController;
use App\Http\Controllers\TourCatalogueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PassengerListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductWarehouseController;
use App\Http\Controllers\ProdutsListWarehouseController;
use App\Http\Controllers\RequestCompleteProductsController;
use App\Http\Controllers\RequestProductsController;
use App\Http\Controllers\RequestProductsToWarehouseController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Models\EquipmentRent;
use App\Models\Inventory;
use App\Models\PassengerList;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


////////////////////////// AUTH
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/request-role/{$id}', [AuthController::class, 'requestRole']);

///////////////////////// USERS

Route::middleware('auth:api')->get('/all-users', [UserController::class, 'all_users']);
// Route::middleware('auth:api')->get('/user_info{id}',[UserController::class, 'all_users']);

Route::get('/user_info/{id}', [UserController::class, 'user_info']);

////////////////////////// TOURS
Route::post('/monthly-tour-add', [MonthlyTourController::class, 'store']);
Route::get('/monthly-tour-list', [MonthlyTourController::class, 'index']);
Route::get('/monthly-tour-list_active/{cant}', [MonthlyTourController::class, 'showMonthlyTourActive']);
Route::get('/monthly-tour-available', [MonthlyTourController::class, 'showMonthlyTourAvailable']);
Route::get('/monthly-tour-show-id/{tour}', [MonthlyTourController::class, 'showMonthlyTour']);
Route::post('/monthly-tour-delete/{tour}', [MonthlyTourController::class, 'destroy']);
Route::post('/monthly-tour-update/{tour}', [MonthlyTourController::class, 'update']);
Route::post('/monthly-tour-update-past-tour', [MonthlyTourController::class, 'updateStatePastTour']);

    ///////////////////////// LIST (LIST FOR PASSENGER)
    Route::post('/list-create',[ListaController::class, 'store']);


    ///////////////////////// PASSENGERS-TOUR (PASSENGER LIST)
    // Route::post('/passengerlistTour-create',[PassengerListMonthlyTourController::class, 'store']); --AHORA SE USA LA API /list-create --
    // Route::get('/passengerlistTour-list',[PassengerListMonthlyTourController::class, 'index']); --NO SE USA EN FRONT --
    Route::get('/passengerlistTour-list-active',[PassengerListMonthlyTourController::class, 'passengerlistTourActive']);
    Route::get('/passengerlistTour-list-byID/{tour}',[PassengerListMonthlyTourController::class, 'findPassengerMonthlyTourById']);
    Route::post('/passengerInList-create',[PassengerListController::class, 'store']); //crea el pasajero si no existe y lo agrega a un listado de pasajeros
    
    //////////////////////// PASSENGER
    Route::post('/passenger-create',[PassengerController::class, 'store']);


///////////////////////// CATALOGUE
Route::post('/catalogue-add', [TourCatalogueController::class, 'store']);
Route::get('/catalogue-list', [TourCatalogueController::class, 'index']);
Route::get('/show-catalogue-tour/{tour}', [TourCatalogueController::class, 'showTour']);
Route::post('/catalogue-tour-delete/{tour}', [TourCatalogueController::class, 'destroy']);
Route::post('/catalogue-tour-update/{tour}', [TourCatalogueController::class, 'update']);

///////////////////////// EQUIPMENT
Route::post('/equipment-add', [EquipmentController::class, 'store']);
Route::get('/equipment-list', [EquipmentController::class, 'equipmentList']);
Route::get('/equipment-show/{equipment}', [EquipmentController::class, 'showequipment']);
Route::post('/equipment-delete/{equipment}', [EquipmentController::class, 'destroy']);
Route::post('/equipment-update/{equipment}', [EquipmentController::class, 'update']);

///////////////////////// EQUIPMENT RENT
Route::post('/equipment-rent-add', [EquipmentRentController::class, 'store']);
Route::get('/equipment-rent-list', [EquipmentRentController::class, 'index']);
Route::get('/equipment-rent-show/{equipmentRent}', [EquipmentRentController::class, 'showequipmentrent']);
Route::post('/equipment-rent-delete/{equipmentRent}', [EquipmentRentController::class, 'destroy']);
Route::post('/equipment-rent-update/{equipmentRent}', [EquipmentRentController::class, 'update']);

///////////////////////// GALLERY
Route::post('/gallery-add', [GalleryController::class, 'store']);
Route::get('/gallery-list', [GalleryController::class, 'index']);
Route::post('/gallery-delete/{equipmentRent}', [GalleryController::class, 'destroy']);
Route::get('/gallery-show/{equipmentRent}', [GalleryController::class, 'showGallery']);
Route::post('/gallery-update/{equipmentRent}', [GalleryController::class, 'update']);


///////////////////////// INVENTORY
Route::get('/category-list', [CategoryController::class, 'index']);
Route::get('/product-list', [ProductController::class, 'index']);
Route::get('/supplier-list', [SupplierController::class, 'index']);
Route::get('/warehouse-list', [WarehouseController::class, 'index']);
Route::get('/status-list', [StatusController::class, 'index']);

Route::get('/inventory-list', [InventoryController::class, 'index']);
Route::get('/productsInWarehouse/{warehouse}', [ProductWarehouseController::class, 'productsInWarehouse']);
Route::post('/inventory-add', [InventoryController::class, 'store']);
Route::post('/inventory-edit', [InventoryController::class, 'update']);
Route::get('/inventory-show/{inventoryId}', [InventoryController::class, 'showInventoryById']);
//// REQUEST PRODUCTS ADMIN
Route::post('/request-complete-products-add', [RequestProductsToWarehouseController::class, 'generateOrderAdm']);
Route::post('/request-products-add', [RequestProductsToWarehouseController::class, 'addProductsAdm']);
Route::get('/request-products-list/{userId}', [RequestProductsToWarehouseController::class, 'indexRequesProductsAdm']);
Route::get('/request-complete-products-list', [RequestCompleteProductsController::class, 'indexAdm']);
Route::get('/request-products-guide-list/{requestCompleteProducts}/{userId}', [RequestCompleteProductsController::class, 'productsListGuideAdm']);
Route::post('/request-completes-update-status/{requestProduct}', [RequestCompleteProductsController::class, 'updateStatusRequestHistoryAdm']);
Route::post('/request-completes-update-products-retired/{requestProduct}', [RequestCompleteProductsController::class, 'updateStatusProductsRetiredHistoryAdm']);
Route::post('/request-product-update-products-withdrawal/{requestProductsComplete}', [RequestCompleteProductsController::class, 'upDateProductsWithdrawalWarehouse']);
Route::get('/request-complete-products-list-rejected-retired', [RequestCompleteProductsController::class, 'indexListRejectedRetiredAdm']);

Route::post('/product-add', [ProductController::class, 'store']);
Route::post('/product-update/{idProduct}', [ProductController::class, 'update']);
Route::post('/product-delete/{product}', [ProductController::class, 'destroy']);

Route::post('/productsWarehouse-add', [ProductWarehouseController::class, 'store']);
Route::post('/productsWarehouse-delete/{id}', [ProductWarehouseController::class, 'destroy']);
Route::post('/productsWarehouse-addObservation/{id}', [ProductWarehouseController::class, 'addObservation']);

// GUIDE - LISTA PRODUCTOS
Route::get('/products-list', [ProdutsListWarehouseController::class, 'index']);
// GUIDE - SELECT SOLICITUD PRODUCTOS
Route::get('/request-products', [RequestProductsController::class, 'requestProductSelect']);
Route::post('/request-product-add', [RequestProductsToWarehouseController::class, 'store']);
Route::get('/request-product-list/{userId}', [RequestProductsToWarehouseController::class, 'index']);
Route::post('/request-product-delete/{requestProducts}', [RequestProductsToWarehouseController::class, 'destroy']);
Route::post('/request-product-update/{requestProducts}', [RequestProductsToWarehouseController::class, 'update']);
Route::post('/request-product-update-status/{requestProduct}', [RequestProductsToWarehouseController::class, 'updateStatus']);

Route::post('/request-complete-product-add', [RequestProductsToWarehouseController::class, 'generateOrder']);
Route::get('/request-complete-product-list/{inventoryId}', [RequestCompleteProductsController::class, 'index']);
Route::post('/request-complete-product-delete/{requestProducts}', [RequestCompleteProductsController::class, 'destroy']);
Route::get('/request-product-guide-list/{requestCompleteProducts}/{userId}', [RequestCompleteProductsController::class, 'productsListGuide']);
Route::get('/request-complete-product-title-list/{requestCompleteProducts}', [RequestCompleteProductsController::class, 'productsListTitle']);
Route::post('/request-complete-update-status/{requestProduct}', [RequestCompleteProductsController::class, 'updateStatusRequestHistory']);
// Route::post('/request-complete-status/{requestProductStatus}', [RequestCompleteProductsController::class, 'statusRequestHistory']);

Route::get('/enterprise', [EnterpriseController::class, 'index']);
