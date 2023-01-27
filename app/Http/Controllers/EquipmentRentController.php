<?php

namespace App\Http\Controllers;

use App\Models\EquipmentRent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (EquipmentRent::all());
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
        $request -> validate([
            'img_1' => "required|image"
        ]);

        $data = ($request->all());
        if($request ->hasFile('img_1')){
            $path = $request->img_1->store('equipment', 'public');
        } else {
            return ([
                "Response" => '500',
                "Success" => false
            ]);
        }

        $data ['img_1']=$path;
        EquipmentRent::insert($data);

        return ([
            "Information" => $data,
            "messagge" => 'Equipo de alquiler agregado exitosamente',
            "Response" => '200',
            "Success" => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentRent  $equipmentRent
     * @return \Illuminate\Http\Response
     */
    public function showequipmentrent($equipmentRent)
    {
        $equipRent = EquipmentRent::where('equipment_rent_id', $equipmentRent)->get();
        return([
            "Information"=>$equipRent,
            "Message"=>'Informacion exitosa',
            "Response"=>'200',
        ]);
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
        $request -> validate([
            'img_1' => 'required|image'
        ]);

        $inf = ($request->all());
        if($request->hasFile('img_1')){
            $infEquipRent = EquipmentRent::where('equipment_rent_id', $id)->firstOrFail();
            Storage::delete('public/'.$infEquipRent->img_1);
            $path = $request->img_1->store('equipment', 'public');
        }else{
            return([
                "Response"=>'500',
                "Success"=>false
            ]);
        }

        $inf['img_1'] = $path;
        EquipmentRent::where('equipment_rent_id', $id)->update($inf);
        return([
            "Information" => $inf,
            "Messagge" => 'Equipo actualizado con exito',
            "Response" => 200,
            "Success" => True
        ]);
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
        if($equipRent == 1){
            return([
                "Message"=>'Equipo de alquiler eliminado exitosamente',
                "Response"=> '200',
                "Success"=>true
            ]);
        }else{
            return([
                "Message"=>'Equipo de alquiler no eliminado',
                "Response"=>'500',
                "Success"=> false
            ]);
        }
    }
}
