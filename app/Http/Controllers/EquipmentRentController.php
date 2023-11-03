<?php

namespace App\Http\Controllers;

use App\Models\EquipmentRent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class EquipmentRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return (EquipmentRent::all());
        $inventory = DB::table('equipment_rents')
        ->join('inventories', 'equipment_rents.inventories_id', '=', 'inventories.inventories_id')
        ->join('products', 'inventories.product_id', '=', 'products.product_id')
        ->join('categories', 'products.category_id', '=', 'categories.categories_id')
        ->join('statuses', 'inventories.status_id', '=', 'statuses.status_id')
        ->select('inventories.inventories_id', 'inventories.stock', 'products.description as product', 
        'products.product_id as product_id', 'products.rent_price as rent_price','products.img as img',  
        'categories.description as category', 'statuses.description as status', 'statuses.status_id as status_id', 
        'inventories.inWarehouse', 'inventories.withoutWarehouse','equipment_rents.description as description',
        'equipment_rents.isActive as isActive','equipment_rents.contact_phone as contact_phone',
        'equipment_rents.discount_description as discount_description',
        'equipment_rents.discount as discount','equipment_rents.messagge_for_contact as messagge_for_contact'
        )
        ->orderBy('products.description', 'asc')
        ->orderBy('statuses.description', 'asc')
        // ->where('inventories_id', '=', $id)
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
        // $request->validate([
        //     'img_1' => "required|image"
        // ]);
        // $directory = storage_path() . '/app/public/equipmentRent/';
        // if (!file_exists($directory)) {
        //     mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        // }

        $data = ($request->all());
        // if ($request->hasFile('img_1')) {
        //     // $path = $request->img_1->store('equipmentRent','public');
        //     $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
        //     $ruta = storage_path() . '/app/public/equipmentRent/' . $name_img;
        //     $img = Image::make($request->file('img_1'));
        //     $img->orientate();
        //     $img->resize(1200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($ruta);
        //     $img->destroy();


        //     $path1 = 'equipmentRent/' . $name_img;
        //     $data['img_1'] = $path1;
        // } else {
        //     return response([
        //         "response" => '500',
        //         "success" => false,
        //     ]);
        // }


        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();


        $res = EquipmentRent::insert($data);

        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Equipo agregado Exitosamente',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "messagge" => 'Error: Equipo No Agregado ',
                "response" => 200,
                "success" => false,

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function showequipmentRent($equipmentRent)
    {
        
        $equip = EquipmentRent::where('equipment_rent_id', $equipmentRent)->get();
        return($equip); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentRent $equipmentRent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $inf = ($request->all());
        if ($request->hasFile('img_1')) {
            $infEquipRent = EquipmentRent::where('equipment_rent_id', $id)->firstOrFail();
            Storage::delete('public/' . $infEquipRent->img_1);
            $path = $request->img_1->store('equipmentRent', 'public');
            $inf['img_1'] = $path;
        }

        $equipRent = EquipmentRent::where('equipment_rent_id', $id)->update($inf);
        
        if ($equipRent == 1) {
            return ([
                "messagge" => 'Equipo de alquiler editado exitosamente',
                "response" => '200',
                "success" => true
            ]);
        } else {
            return ([
                "messagge" => 'Equipo de alquiler no editado',
                "response" => '500',
                "success" => false
            ]);
        }
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipRent = EquipmentRent::where('equipment_rent_id', $id)->delete();
        Storage::delete('public/' . $equipRent->img_1);
        if ($equipRent == 1) {
            return ([
                "Message" => 'Equipo de alquiler eliminado exitosamente',
                "Response" => '200',
                "Success" => true
            ]);
        } else {
            return ([
                "Message" => 'Equipo de alquiler no eliminado',
                "Response" => '500',
                "Success" => false
            ]);
        }
    }
}
