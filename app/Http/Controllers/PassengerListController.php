<?php

namespace App\Http\Controllers;

use App\Models\PassengerList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PassengerListController extends Controller
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
        // Obtén los datos del formulario
        $requestData = ($request->all());
        $passengerType = $requestData['passenger_type'];

        if ($passengerType == "Responsable") {
            if ($request->hasFile('img_cmp_1')) {
                $name_img_1 = Str::random(10) . $request->file('img_cmp_1')->getClientOriginalName();
                $img = Image::make($request->file('img_cmp_1'));
                $img->orientate();
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Guarda la imagen utilizando Storage
                $path1 = 'public/passengerListPayments/' . $name_img_1;
                Storage::put($path1, $img->stream());
                // $requestData['img_cmp_1'] = $path1;
                $requestData['img_cmp_1'] = str_replace('public/', '', $path1);
            }
            // Verifica si se cargó el archivo img_cmp_2
            if ($request->hasFile('img_cmp_2')) {
                $name_img_2 = Str::random(10) . $request->file('img_cmp_2')->getClientOriginalName();
                $img = Image::make($request->file('img_cmp_2'));
                $img->orientate();
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Guarda la imagen utilizando Storage
                $path2 = 'public/passengerListPayments/' . $name_img_2;
                Storage::put($path2, $img->stream());
                // $requestData['img_cmp_2'] = $path2;
                $requestData['img_cmp_2'] = str_replace('public/', '', $path2);
            }
        } else {
            // Si el tipo de pasajero no es "Responsable", establece los campos de imagen en vacío
            $requestData['img_cmp_1'] = '';
            $requestData['img_cmp_2'] = '';
        }

        // Agrega la fecha y hora actual con Carbon
        $requestData['created_at'] = now();
        $requestData['updated_at'] = now();

        $res = PassengerList::insert($requestData);
        if ($res == 1) {
            return response([
                "messagge" => 'LISTA de PASAJEROS Agregado',
                "response" => 200,
                "success" => true,
                "data" => $requestData,

            ]);
        } else {
            return response([
                "messagge" => 'Error: No se agregó pasajero',
                "response" => 200,
                "success" => false,
                "data" => $requestData,

            ]);
        }
        return $requestData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */

    public function listOfPassengers($list_id)
    {
        $list_of_passenger = DB::table('passenger_lists')
            ->join('passengers', 'passenger_lists.passenger_ci', '=', 'passengers.ci')
            ->join('statuses', 'passenger_lists.state', '=', 'statuses.status_id')
            ->select('passengers.passenger_id', 'passengers.name', 'passengers.ci', 'passengers.phone', 'passengers.correo', 'passengers.city', 'passengers.age', 'statuses.description', 'passenger_lists.*')
            ->where('passenger_lists.list_id', '=', $list_id)
            ->where('passenger_lists.state_passenger', '=', 'Activo')
            ->get();

        return $list_of_passenger;
    }

    // public function listOfPassengers($list_id)
    // {
    //     $list_of_passenger = DB::table('passenger_lists')
    //     ->join('passengers', 'passenger_lists.passenger_ci', '=', 'passengers.ci')
    //     ->join('statuses', 'passenger_lists.state', '=', 'statuses.status_id')
    //     ->select(
    //         'passengers.name',
    //         'passengers.ci',
    //         'statuses.description',
    //         'passenger_lists.passenger_lists_id',
    //         'passenger_lists.list_id',
    //         'passenger_lists.seat',
    //         'passenger_lists.unit_cost',
    //         'passenger_lists.total_cost',
    //         'passenger_lists.collected',
    //         'passenger_lists.bus_extra',
    //         'passenger_lists.to_collect',
    //         'passenger_lists.bank',
    //         'passenger_lists.responsable',
    //         'passenger_lists.meeting_point',
    //         'passenger_lists.observation',
    //         'passenger_lists.passenger_type',
    //         'passenger_lists.passenger_group_leader_ci',
    //         'passenger_lists.img_cmp_1',
    //         'passenger_lists.img_cmp_2',
    //         'passenger_lists.state',
    //         'passenger_lists.state_passenger',
    //         DB::raw('COUNT(passenger_lists.passenger_group_leader_ci) as group_leader_count')
    //     )
    //     ->where('passenger_lists.list_id', '=', $list_id)
    //     ->where('passenger_lists.state_passenger', '=', 'Activo')
    //     ->groupBy(
    //         'passengers.name',
    //         'passengers.ci',
    //         'statuses.description',
    //         'passenger_lists.passenger_lists_id',
    //         'passenger_lists.list_id',
    //         'passenger_lists.seat',
    //         'passenger_lists.unit_cost',
    //         'passenger_lists.total_cost',
    //         'passenger_lists.collected',
    //         'passenger_lists.bus_extra',
    //         'passenger_lists.to_collect',
    //         'passenger_lists.bank',
    //         'passenger_lists.responsable',
    //         'passenger_lists.meeting_point',
    //         'passenger_lists.observation',
    //         'passenger_lists.passenger_type',
    //         'passenger_lists.passenger_group_leader_ci',
    //         'passenger_lists.img_cmp_1',
    //         'passenger_lists.img_cmp_2',
    //         'passenger_lists.state',
    //         'passenger_lists.state_passenger'
    //     )
    //     ->get();

    // return $list_of_passenger;
    // }

    public function listOfPassengersComplete($passenger_lists_id)
    {
        $list_of_passenger = DB::table('passenger_lists')
            ->join('passengers', 'passenger_lists.passenger_ci', '=', 'passengers.ci')
            ->join('statuses', 'passenger_lists.state', '=', 'statuses.status_id')
            ->select('passengers.passenger_id', 'passengers.ci', 'passengers.name', 'passengers.phone', 'passengers.city', 'passengers.correo', 'passengers.age', 'statuses.description', 'passenger_lists.*')
            ->where('passenger_lists.passenger_lists_id', '=', $passenger_lists_id)
            ->where('passenger_lists.state_passenger', '=', 'Activo')
            ->get();

        return $list_of_passenger;
    }

    public function show(PassengerList $passengerList)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function edit(PassengerList $passengerList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $passenger_lists_id )
    // {
    //     $data = $request->all();
    //      // Verifica si se cargó el archivo img_cmp_2
    //         if ($request->hasFile('img_cmp_2')) {
    //             $name_img_2 = Str::random(10) . $request->file('img_cmp_2')->getClientOriginalName();
    //             $img = Image::make($request->file('img_cmp_2'));
    //             $img->orientate();
    //             $img->resize(1200, null, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             });
    //             // Guarda la imagen utilizando Storage
    //             $path2 = 'public/passengerListPayments/' . $name_img_2;
    //             Storage::put($path2, $img->stream());
    //             // $requestData['img_cmp_2'] = $path2;
    //             $requestData['img_cmp_2'] = str_replace('public/', '', $path2);
    //         }
    //     $data['created_at'] = now();
    //     $data['updated_at'] = now();

    //     $res = PassengerList::where('passenger_lists_id', $passenger_lists_id)->update($data);
    //     if ($res == 1) {
    //         return response([
    //             "data" => $data,
    //             "messagge" => 'Datos de Lista de Pasajero Actualizado Exitosamente',
    //             "response" => 200,
    //             "success" => true,

    //         ]);
    //     } else {
    //         return response([
    //             "messagge" => 'Error: Datos Lista de Pasajero No Actualizado ',
    //             "response" => 200,
    //             "success" => false,

    //         ]);
    //     }
    // }    


    // public function update(Request $request, $passenger_lists_id)
    // {
    //     $data = $request->all();
    //     $requestData = []; // Inicializa $requestData

    //     // Verifica si se cargó el archivo img_cmp_2
    //     if ($request->hasFile('img_cmp_2')) {
    //         $name_img_2 = Str::random(10) . $request->file('img_cmp_2')->getClientOriginalName();

    //         $img = Image::make($request->file('img_cmp_2'));
    //         $img->orientate();
    //         $img->resize(1200, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         });

    //         // Guarda la imagen utilizando Storage
    //         $path2 = 'public/passengerListPayments/' . $name_img_2;
    //         Storage::put($path2, $img->stream());
    //         $requestData['img_cmp_2'] = str_replace('public/', '', $path2);
    //     }
    //     $data['created_at'] = now();
    //     $data['updated_at'] = now();
    //     // if (isset($data['passenger_ci'])) {
    //     //     $passenger_ciSend = $data['passenger_ci'];
    //     //     var_dump('Valor de passenger_ciSend:', $passenger_ciSend);
    //     // }
    //     // if (isset($data['passenger_group_leader_ci'])) {
    //     //     $passenger_group_leader_ciSend = $data['passenger_group_leader_ci'];
    //     //     var_dump('Valor de passenger_group_leader_ciSend:', $passenger_group_leader_ciSend);
    //     // }
    //     // if (isset($data['responsable'])) {
    //     //     $responsableSend = $data['responsable'];
    //     //     var_dump('Valor de responsableSend:', $responsableSend);
    //     // }
    //     // if (isset($data['meeting_point'])) {
    //     //     $meeting_pointSend = $data['meeting_point'];
    //     //     var_dump('Valor de meeting_pointSend:', $meeting_pointSend);
    //     // }
    //     // return $inventoryProductStock;
    //     // $getCiOld = DB::table('passenger_lists')
    //     //     ->where('passenger_type', 'Acompañante')
    //     //     ->where('passenger_group_leader_ci', $passenger_ciSend)
    //     //     ->value('passenger_ci');
    //     //     var_dump('Valor de getCiOld:', $getCiOld);
    //     // return $getCiOld;
    //     // Actualizar CIs en ACOMPAÑANTES:       
    //     // DB::table('passenger_lists')
    //     //     ->where('passenger_type', 'Acompañante')
    //     //     ->where('passenger_group_leader_ci', $passenger_group_leader_ciSend)
    //     //     ->update(['passenger_group_leader_ci' => $passenger_ciSend]);
    //     // Actualizar RESPONSABLE Y MEETING POINT en ACOMPAÑANTES: 
    //     // DB::table('passenger_lists')
    //     //     ->where('passenger_ci', $passenger_ciSend)
    //     //     ->where('passenger_type', 'Acompañante')
    //     //     ->update(['responsable' => $responsableSend, 'meeting_point' => $passenger_ciSend]);

    //     $res = PassengerList::where('passenger_lists_id', $passenger_lists_id)->update($data + $requestData);

    //     if ($res == 1) {
    //         return response([
    //             "data" => $data,
    //             "message" => 'Datos de Lista de Pasajero Actualizado Exitosamente',
    //             "response" => 200,
    //             "success" => true,
    //         ]);
    //     } else {
    //         return response([
    //             "message" => 'Error: Datos Lista de Pasajero No Actualizado ',
    //             "response" => 200,
    //             "success" => false,
    //         ]);
    //     }
    // }


    public function update(Request $request, $passenger_lists_id, $passenger_ci_old)
    {
        $data = $request->all();
        $requestData = []; // Inicializa $requestData

        // Verifica si se cargó el archivo img_cmp_2
        if ($request->hasFile('img_cmp_2')) {
            $name_img_2 = Str::random(10) . $request->file('img_cmp_2')->getClientOriginalName();

            $img = Image::make($request->file('img_cmp_2'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Guarda la imagen utilizando Storage
            $path2 = 'public/passengerListPayments/' . $name_img_2;
            Storage::put($path2, $img->stream());
            $requestData['img_cmp_2'] = str_replace('public/', '', $path2);
        }
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $passenger_group_leader_ci = DB::table('passenger_lists')
            ->where('passenger_group_leader_ci', $passenger_ci_old)
            ->value('passenger_group_leader_ci');
        // dd($passenger_group_leader_ci);
        var_dump('Valor de passenger_group_leader_ci Old:', $passenger_group_leader_ci);
        // return $passenger_group_leader_ci;
        if (isset($data['passenger_ci'])) {
            $passenger_ciSendNew = $data['passenger_ci'];
            var_dump('Valor de passenger_ciSendNew:', $passenger_ciSendNew);
        }
        DB::table('passenger_lists')
            ->where('passenger_type', 'Acompañante')
            ->where('passenger_group_leader_ci', $passenger_group_leader_ci)
            ->update(['passenger_group_leader_ci' => $passenger_ciSendNew]);
        DB::table('passenger_lists')
            ->where('passenger_type', 'Responsable')
            ->where('passenger_group_leader_ci', $passenger_group_leader_ci)
            ->update(['passenger_group_leader_ci' => $passenger_ciSendNew]);

        if (isset($data['responsable'])) {
            $responsableSend = $data['responsable'];
            var_dump('Valor de responsableSend:', $responsableSend);
        }
        if (isset($data['meeting_point'])) {
            $meeting_pointSend = $data['meeting_point'];
            var_dump('Valor de meeting_pointSend:', $meeting_pointSend);
        }
        DB::table('passenger_lists')
            ->where('passenger_type', 'Acompañante')
            ->where('passenger_group_leader_ci', $passenger_ciSendNew)
            ->update(['responsable' => $responsableSend, 'meeting_point' => $meeting_pointSend]);

        $res = PassengerList::where('passenger_lists_id', $passenger_lists_id)->update($data);

        if ($res == 1) {
            return response([
                "data" => $data,
                "message" => 'Datos de Lista de Pasajero Actualizado Exitosamente',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                "message" => 'Error: Datos Lista de Pasajero No Actualizado ',
                "response" => 200,
                "success" => false,
            ]);
        }
    } 

    public function UpdateFullPayment(Request $request, $passenger_lists_id)
    {
        $data = $request->all();

        $data['created_at'] = now();
        $data['updated_at'] = now();

        $passengerListUnitCost = DB::table('passenger_lists')
            ->where('passenger_lists_id', $passenger_lists_id)
            ->value('unit_cost');
        // dd($passengerListUnitCost);
        var_dump('Valor de passengerListUnitCost:', $passengerListUnitCost);

        $passengerListTotalCost = DB::table('passenger_lists')
            ->where('passenger_lists_id', $passenger_lists_id)
            ->value('total_cost');
        // dd($passengerListTotalCost);
        var_dump('Valor de passengerListUnitCost:', $passengerListTotalCost);    

        DB::table('passenger_lists')
            ->where('passenger_lists_id', $passenger_lists_id)
            ->update(['total_cost' => $passengerListTotalCost, 'collected' => $passengerListTotalCost, 'to_collect' => 0, 'state' => 7]);

        $res = PassengerList::where('passenger_lists_id', $passenger_lists_id)->update($data);

        if ($res == 1) {
            return response([
                "data" => $data,
                "message" => 'Datos de Lista de Pasajero Actualizado Exitosamente',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                "message" => 'Error: Datos Lista de Pasajero No Actualizado ',
                "response" => 200,
                "success" => false,
            ]);
        }
    } 



    public function updateImg2(Request $request, $passenger_list_id)
    {
        // Obtén los datos del formulario
        $requestData = ($request->all());
        // $passengerType = $requestData['passenger_type'];

        // if ($passengerType == "Responsable") {
            // if ($request->hasFile('img_cmp_1')) {
            //     $name_img_1 = Str::random(10) . $request->file('img_cmp_1')->getClientOriginalName();
            //     $img = Image::make($request->file('img_cmp_1'));
            //     $img->orientate();
            //     $img->resize(1200, null, function ($constraint) {
            //         $constraint->aspectRatio();
            //     });
            //     // Guarda la imagen utilizando Storage
            //     $path1 = 'public/passengerListPayments/' . $name_img_1;
            //     Storage::put($path1, $img->stream());
            //     // $requestData['img_cmp_1'] = $path1;
            //     $requestData['img_cmp_1'] = str_replace('public/', '', $path1);
            // }
            // Verifica si se cargó el archivo img_cmp_2


            if ($request->hasFile('img_cmp_2')) {
                $name_img_2 = Str::random(10) . $request->file('img_cmp_2')->getClientOriginalName();
                $img = Image::make($request->file('img_cmp_2'));
                $img->orientate();
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Guarda la imagen utilizando Storage
                $path2 = 'public/passengerListPayments/' . $name_img_2;
                Storage::put($path2, $img->stream());
                // $requestData['img_cmp_2'] = $path2;
                $requestData['img_cmp_2'] = str_replace('public/', '', $path2);
            }

            
        // } else {
        //     // Si el tipo de pasajero no es "Responsable", establece los campos de imagen en vacío
        //     $requestData['img_cmp_1'] = '';
        //     $requestData['img_cmp_2'] = '';
        // }

        // Agrega la fecha y hora actual con Carbon
        $requestData['created_at'] = now();
        $requestData['updated_at'] = now();

        // $res = PassengerList::insert($requestData);
        $res = PassengerList::where('passenger_lists_id', $passenger_list_id)->update($requestData);
        if ($res == 1) {
            return response([
                "messagge" => 'LISTA de PASAJEROS Agregado',
                "response" => 200,
                "success" => true,
                "data" => $requestData,

            ]);
        } else {
            return response([
                "messagge" => 'Error: No se agregó pasajero',
                "response" => 200,
                "success" => false,
                "data" => $requestData,

            ]);
        }
        return $requestData;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassengerList $passengerList, $passenger_lists_id)
    {
        try {
            DB::table('passenger_lists')
                ->where('passenger_lists_id', $passenger_lists_id)
                ->update(['state_passenger' => 'Inactivo']);

            return response([
                "message" => 'Pasajero ELIMINADO con éxito',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al ELIMINAR pasajero',
                "response" => 500,
                "success" => false,
            ]);
        }
    }
}
