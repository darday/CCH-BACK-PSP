<?php

namespace App\Http\Controllers;

use App\Models\tour_catalogue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

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
            // $path1 = $request->img_1->store('catalogue', 'public');
            // $path2 = $request->img_2->store('catalogue', 'public');
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\catalogue/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'catalogue/' . $name_img;
            $data['img_1'] = $path1;

            $name_img = Str::random(10) . $request->file('img_2')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\catalogue/' . $name_img;
            $img = Image::make($request->file('img_2'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path2 = 'catalogue/' . $name_img;
            $data['img_2'] = $path2;
        } else {
            return response([
                "response" => '500',
                "success" => false,

            ]);
        }


        $data['img_1'] = $path1;
        $data['img_2'] = $path2;
        $data['created_at'] = Carbon::now();

        $res = tour_catalogue::insert($data);
        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Tour Agregado a Catálogo',
                "response" => 200,
                "success" => true,

            ]);
        }else{
            return response([
                "data" => $data,
                "messagge" => 'Error Tour No Agregado a Catálogo',
                "response" => 500,
                "success" => false,

            ]);
        }
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
            // $path1 = $request->img_1->store('catalogue', 'public');
            // $data['img_1'] = $path1;
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\catalogue/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'catalogue/' . $name_img;
            $data['img_1'] = $path1;
        }
        if ($request->hasFile('img_2')) {
            $tour =  tour_catalogue::where('tour_catalogues_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_2);
            // $path2 = $request->img_2->store('catalogue', 'public');
            // $data['img_2'] = $path2;
            $name_img = Str::random(10) . $request->file('img_2')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\catalogue/' . $name_img;
            $img = Image::make($request->file('img_2'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path2 = 'catalogue/' . $name_img;
            $data['img_2'] = $path2;
        }



        $res = tour_catalogue::where('tour_catalogues_id', $id)->update($data);
        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Tour Actualizado Exitosamente',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "messagge" => 'Error: Tour No Actualizado ',
                "response" => 200,
                "success" => false,

            ]);
        }
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
