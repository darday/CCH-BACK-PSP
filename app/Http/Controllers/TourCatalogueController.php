<?php

namespace App\Http\Controllers;

use App\Models\tour_catalogue;
use Illuminate\Http\Request;

class TourCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return(tour_Catalogue::all());
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
        $request->validate([
            'img_1'=>'required|image',
            'img_2'=>'required|image'
        ]);

        $data = ( $request->all());
        if($request->hasFile('img_1') || $request->hasFile('img_2')){
            $path1 = $request->img_1->store('catalogue','public');
            $path2 = $request->img_2->store('catalogue','public');
        }else{
            return response([
                "response"=>'500',
                "success"=>false,
                
            ]);
        }
        $data['img_1']=$path1;
        $data['img_2']=$path2;
        tour_catalogue::insert($data);
        
        return response([
            "data"=>$data,
            "messagge"=>'Tour Agregado a Catálogo',
            "response"=>200,
            "success"=>true,
            
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tour_catalogue  $tour_catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(tour_catalogue $tour_catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tour_catalogue  $tour_catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(tour_catalogue $tour_catalogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tour_catalogue  $tour_catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tour_catalogue $tour_catalogue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tour_catalogue  $tour_catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(tour_catalogue $tour_catalogue)
    {
        //
    }
}
