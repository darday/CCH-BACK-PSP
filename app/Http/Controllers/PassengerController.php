<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
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
        // $edad = $request->age;
        // $fechaActual = Carbon::now();
        // $fechaNacimiento = $fechaActual->subYears($edad);
        // echo "Fecha de nacimiento: " . $fechaNacimiento->format('Y-m-d');
        $data = $request->all();
        // $data['born_date'] = $fechaNacimiento->format('Y-m-d');
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $res = Passenger::insert($data);
        if ($res == 1) {
            return response([
                "messagge" => 'Pasajero Agregado',
                "response" => 200,
                "success" => true,
                "data" => $data,

            ]);
        } else {
            return response([
                "messagge" => 'Error: No se agregó pasajero',
                "response" => 200,
                "success" => false,
                "data" => $data,

            ]);
        }
        return $data;
    }

    public function getPassengerName($ci)
    {
        try {
            $passengerName = DB::table('passenger_lists')
                ->join('passengers', 'passenger_lists.passenger_group_leader_ci', '=', 'passengers.ci')
                ->select('passengers.name')
                ->where('passenger_lists.passenger_group_leader_ci', $ci)
                ->first();

            if ($passengerName) {
                return response()->json(['name' => $passengerName->name]);
            }

            return response()->json(['error' => 'Passenger not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger, $ci)
    {
        // Recupera los datos del cuerpo de la solicitud
        $data = $request->all();
        // $data['created_at'] = now();
        // $data['updated_at'] = now();

        $res = Passenger::where('passenger_id', $ci)->update($data);
        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Datos de Pasajero Actualizado Exitosamente',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "messagge" => 'Error: Datos de Pasajero No Actualizado ',
                "response" => 200,
                "success" => false,

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
