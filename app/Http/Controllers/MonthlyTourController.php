<?php

namespace App\Http\Controllers;

use App\Models\MonthlyTour;
use Illuminate\Http\Request;

class MonthlyTourController extends Controller
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
        return ("AAAAA");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        return("hola");

    //     if($request -> hasFile('img_1') || $request -> hasFile('img_2')){
    //         return($request);
    //     }else{
    //         return("hola");
    //     }
    //     MonthlyTour::insert($data);



    //    return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthlyTour  $monthlyTour
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyTour $monthlyTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthlyTour  $monthlyTour
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyTour $monthlyTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyTour  $monthlyTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyTour $monthlyTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyTour  $monthlyTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyTour $monthlyTour)
    {
        //
    }
}
