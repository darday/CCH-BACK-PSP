<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $edad = $request->age;
        $fechaActual = Carbon::now();
        $fechaNacimiento = $fechaActual->subYears($edad);
        // echo "Fecha de nacimiento: " . $fechaNacimiento->format('Y-m-d');
        $data = $request->all();
        $data['born_date'] = $fechaNacimiento->format('Y-m-d');
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
    public function update(Request $request, Passenger $passenger)
    {
        //
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
