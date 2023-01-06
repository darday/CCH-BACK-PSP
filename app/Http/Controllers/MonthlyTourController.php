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
        return (MonthlyTour::all());

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
       
        $data = ($request->all());
        $request->validate([
            'img_1'=>'required|image',
            'img_2'=>'required|image',
        ]);
        if($request->hasFile('img_1')|| $request->hasFile('img_2')){
            $path1=$request->img_1->store('monthly','public');
            $path2=$request->img_2->store('monthly','public');
        }else{
            return response([
                "response"=>'500',
                "success"=>false,
            ]);
        }

        $data['img_1']=$path1;
        $data['img_2']=$path2;

        MonthlyTour::insert($data);

        return response([
            "data"=>$data,
            "messagge"=>"Tour Agregado Correctamente",
            "response"=>200,
            "success"=>true,
        ]);

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
