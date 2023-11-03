<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\PassengerListMonthlyTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengerListMonthlyTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = DB::table('passenger_list_monthly_tours')->get();
        return ($response);
    }

    public function passengerlistTourActive()
    {
        
        $response = DB::table('passenger_list_monthly_tours')
            ->join('monthly_tours','passenger_list_monthly_tours.monthly_tour_id', '=', 'monthly_tours.monthly_tour_id')
            // ->join('passenger_lists','passenger_list_monthly_tours.passenger_lists_id', '=', 'passenger_lists.passenger_lists_id')
            ->where('status', '=', 1)->get();
            $data=[];
            $cont=0;

            foreach ($response as $passengerListMonthlyTour) {
                // Accede a los datos de ambas tablas
                // $passengerList = $passengerListMonthlyTour->passenger_lists_id; // Ejemplo de acceso al campo passenger_lists_id
                $cont=$cont+1;
                // echo($cont);
                $data[$cont]["monthly_tour_id"]= $passengerListMonthlyTour->monthly_tour_id; // Ejemplo de acceso al campo monthly_tour_id
                $data[$cont]["tour_destiny"]= $passengerListMonthlyTour->tour_destiny; // Ejemplo de acceso al campo monthly_tour_id
                $data[$cont]["departure_date"]= $passengerListMonthlyTour->departure_date; // Ejemplo de acceso al campo monthly_tour_id
                $passengerList =  DB::table('passenger_lists')->where('passenger_lists_id', '=', $passengerListMonthlyTour->monthly_tour_id)->get();
                $data[$cont]["cant_passengers"] = count($passengerList);
                $data[$cont]["incomes"] = count($passengerList);
                $data[$cont]["expenses"] = count($passengerList);
                $data[$cont]["utility"] = $data[$cont]["incomes"]  -  $data[$cont]["expenses"] ;
            }

            $transformedData = array_values($data);
            // $json = json_encode($transformedData);
            // $data = json_encode($transformedData);
        
        return ($transformedData);
    }




    public function tours_with_passengers()
    {
        $response = DB::table('passenger_list_monthly_tours')->get();
        return ($response);
    }




    public function findPassengerMonthlyTourById($id)
    {
        $response = DB::table('passenger_list_monthly_tours')->where('monthly_tour_id', '=', $id)->get();
        $cont = count($response);
        if ($cont > 0) {
            return response([
                "messagge" => 'Lista Creada',
                "response" => 200,
                "success" => true,
                "data" => $response,
                "count" => $cont
            ]);
        } else {
            return response([
                "messagge" => 'No existe lista de Psajeros',
                "response" => 200,
                "success" => true,
                "data" => $response,
                "count" => $cont

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
        // return($request->monthly_tour_id);
        $data['description'] = $request->tour_destiny;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        Lista::insert($data);
        $list =  Lista::orderby('created_at','desc') ->first();
        return $list->list_id;





        $data['passenger_lists_id'] = $request->monthly_tour_id;
        $data['monthly_tour_id'] = $request->monthly_tour_id;
        $data['status'] = 1;
        $res = PassengerListMonthlyTour::insert($data);

        if ($res == 1) {
            return response([
                "messagge" => 'Lista Creada',
                "response" => 200,
                "success" => true,
                "data" => $data,

            ]);
        } else {
            return response([
                "messagge" => 'Error: No se creo la lista',
                "response" => 200,
                "success" => false,
                "data" => $data,

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassengerListMonthlyTour  $passengerListMonthlyTour
     * @return \Illuminate\Http\Response
     */
    public function show(PassengerListMonthlyTour $passengerListMonthlyTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassengerListMonthlyTour  $passengerListMonthlyTour
     * @return \Illuminate\Http\Response
     */
    public function edit(PassengerListMonthlyTour $passengerListMonthlyTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassengerListMonthlyTour  $passengerListMonthlyTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassengerListMonthlyTour $passengerListMonthlyTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassengerListMonthlyTour  $passengerListMonthlyTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassengerListMonthlyTour $passengerListMonthlyTour)
    {
        //
    }
}
