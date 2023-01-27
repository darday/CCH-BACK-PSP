<?php

namespace App\Http\Controllers;

use App\Models\tour_catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Illuminat\Support\Facades\Storage;

class TourCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (tour_Catalogue::all());
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
            'img_1' => 'required|image',
            'img_2' => 'required|image'
        ]);

        $data = ($request->all());
        if ($request->hasFile('img_1') || $request->hasFile('img_2')) {
            $path1 = $request->img_1->store('catalogue', 'public');
            $path2 = $request->img_2->store('catalogue', 'public');
        } else {
            return response([
                "response" => '500',
                "success" => false,

            ]);
        }
        $data['img_1'] = $path1;
        $data['img_2'] = $path2;
        tour_catalogue::insert($data);

        return response([
            "data" => $data,
            "messagge" => 'Tour Agregado a Catálogo',
            "response" => 200,
            "success" => true,

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
    public function update(Request $request, $id)
    {


        // $request->validate([
        //     'img_1' => 'required|image',
        //     'img_2' => 'required|image'
        // ]);

        $data = ($request->all());
        if ($request->hasFile('img_1')) {
            $tour =  tour_catalogue::where('tour_catalogues_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_1);
            $path1 = $request->img_1->store('catalogue', 'public');
            $data['img_1'] = $path1;
        }
        if ($request->hasFile('img_2')) {
            $tour =  tour_catalogue::where('tour_catalogues_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_2);
            $path2 = $request->img_2->store('catalogue', 'public');
            $data['img_2'] = $path2;
        }



        tour_catalogue::where('tour_catalogues_id', $id)->update($data);

        return response([
            "data" => $data,
            "messagge" => 'Tour Actualizado Exitosamente',
            "response" => 200,
            "success" => true,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tour_catalogue  $tour_catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour =  tour_catalogue::where('tour_catalogues_id', $id)->firstOrFail();
        Storage::delete('public/' . $tour->img_1);
        Storage::delete('public/' . $tour->img_2);
        tour_catalogue::where('tour_catalogues_id', $id)->delete();
        return response([
            "messagge" => 'Tour Eliminado Exitosamente',
            "response" => 200,
            "success" => true,

        ]);
    }

    public function showTour($id)
    {
        $tour =  tour_catalogue::where('tour_catalogues_id', $id)->get();
        return ($tour);
    }
}
