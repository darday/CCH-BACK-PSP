<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipmentList()
    {
        $results = Equipment::orderBy('name','asc')->get();

        return($results);
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
        // return($request);
        
        $request->validate([
            'img_1'=>'required|image'
        ]);

        $directory = storage_path() . '/app/public/equipment/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        }

        $data = ($request->all());
        if($request->hasFile('img_1')){
            // $path = $request->img_1->store('equipment','public');
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/equipment/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ruta);
            $img->destroy();


            $path1='equipment/'.$name_img;
            $data['img_1'] = $path1;
        }else{
            return response([
                "response"=>'500',
                "success"=>false,
            ]);
        }
        $data['created_at'] = Carbon::now();


        $res = Equipment::insert($data);

        if($res==1){
            return response([
                "data" => $data,
                "messagge" => 'Equipo agregado Exitosamente',
                "response" => 200,
                "success" => true,
    
            ]);
        }else{
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
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = ($request ->all());
        if($request -> hasFile('img_1')){
            $dataEquipment = Equipment::where('equipment_id', $id)->firstOrFail();
            Storage::delete('public/'.$dataEquipment->img_1);
            // $path = $request->img_1->store('equipment', 'public');
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/equipment/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ruta);
            $img->destroy();


            $path1='equipment/'.$name_img;
            $data['img_1'] = $path1;
        }
        // $data['img_1'] = $path;

        $res = Equipment::where('equipment_id', $id)->update($data);

        if($res==1){
            return response([
                "data" => $data,
                "messagge" => 'Tour Actualizado Exitosamente',
                "response" => 200,
                "success" => true,
    
            ]);
        }else{
            return response([
                "messagge" => 'Error: Tour No Actualizado ',
                "response" => 200,
                "success" => false,
    
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment =  Equipment::where('equipment_id', $id)->firstOrFail();
        Storage::delete('public/' . $equipment->img_1);
        $resp = Equipment::where('equipment_id', $id)->delete();
        if($resp == 1){
        return([
            "messagge"=>'Equipo eliminado exitosamente',
            "response"=>'200',
            "success"=>true,
        ]);
        }else{
            return([
                "messagge"=>'Equipo ya eliminado',
                "response"=>'500',
                "success"=>false,
            ]);
        }
        
    }

    public function showequipment($equipment)
    {
        $equip = Equipment::where('equipment_id', $equipment)->get();
        return($equip); 

    }
}
