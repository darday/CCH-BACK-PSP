<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipmentList()
    {
        return(Equipment::all());
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

        $data = ($request->all());
        if($request->hasFile('img_1')){
            $path = $request->img_1->store('equipment','public');
        }else{
            return response([
                "response"=>'500',
                "success"=>false,
            ]);
        }

        $data['img_1']=$path;
        Equipment::insert($data);

        return response([
            "data"=>$data,
            "messagge"=>'Equipo agregado',
            "response"=>'200',
            "success"=>true,
        ]);
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
        $request -> validate([
            'img_1' => 'required|image'
        ]);

        $data = ($request ->all());
        if($request -> hasFile('img_1')){
            $dataEquipment = Equipment::where('equipment_id', $id)->firstOrFail();
            Storage::delete('public/'.$dataEquipment->img_1);

            $path = $request->img_1->store('equipment', 'public');
        }else{
            return ([
                "Response" => '500',
                "Succes" => false
            ]);
        }

        $data['img_1'] = $path;

        Equipment::where('equipment_id', $id)->update($data);

        return ([
            "Information" => $data,
            "Messagge" => 'Equipo actualizado con exito',
            "Response" => 200,
            "Success" => True
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::where('equipment_id', $id)->delete();
        if($equipment == 1){
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
