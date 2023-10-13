<?php

namespace App\Http\Controllers;

use App\Models\MonthlyTour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class MonthlyTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = DB::table('monthly_tours')
            // ->where('state', '=', 1)
            ->orderBy('departure_date', 'asc')
            ->get();
        return ($registros);
    }

    public function showMonthlyTourAvailable()
    {
        $registros = DB::table('monthly_tours')
            ->where('state', '=', 1)
            ->orderBy('departure_date', 'asc')
            ->get();
        return ($registros);
    }

    public function showMonthlyTourActive($cant_registros)
    {
        $currentDate = Carbon::now();
        $registros = DB::table('monthly_tours')
            ->where('state', '=', 1)
            ->where('departure_date', '>=', $currentDate)
            ->orderBy('departure_date', 'asc')
            ->take($cant_registros)
            ->get();
        return ($registros);
    }
    
    public function updateStatePastTour()
    {
        // Pone en inactivo las rutas que ya han pasdo
        $currentDate = Carbon::now();
        $updateTours = MonthlyTour::where('departure_date', '<=', $currentDate)
                        ->update(['state'=>0]);
        var_dump($updateTours);
        if($updateTours >= 1){
            return response([
                "messagge" => 'Exitoso.',
                "response" => '200',
                "success" => true,
            ]);
        }else{
            return response([
                "messagge" => 'Fallido.',
                "response" => '500',
                "success" => false,
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

        if (!$request->hasFile('img_1') || !$request->hasFile('img_2')) {
            return response([
                "messagge" => 'Debe tener dos imagenes.',
                "response" => 422,
                "success" => false,

            ]);
        }

        $directory = storage_path() . '/app/public/monthly/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        }

        if ($request->hasFile('img_1') || $request->hasFile('img_2')) {
            // $path1 = $request->img_1->store('monthly', 'public');
            // $path2 = $request->img_2->store('monthly', 'public');
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            // $ruta = storage_path() . '/app/public/monthly/' . $name_img;
            $ruta = storage_path() . '/app/public/monthly/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'monthly/' . $name_img;
            $data['img_1'] = $path1;

            $name_img = Str::random(10) . $request->file('img_2')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/monthly/' . $name_img;
            $img = Image::make($request->file('img_2'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path2 = 'monthly/' . $name_img;
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


        $res = MonthlyTour::insert($data);

        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Tour Agregado Exitosamente.',
                "response" => 200,
                "success" => true,
            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Error Tour No Agregado.',
                "response" => 500,
                "success" => false,

            ]);
        }
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
    public function update(Request $request, $id)
    {
        $data = ($request->all());
        if ($request->hasFile('img_1')) {
            $tour =  MonthlyTour::where('monthly_tour_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_1);
            // $path1 = $request->img_1->store('Monthly', 'public');
            // $data['img_1'] = $path1;
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/monthly/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'monthly/' . $name_img;
            $data['img_1'] = $path1;
        }
        if ($request->hasFile('img_2')) {
            $tour =  MonthlyTour::where('monthly_tour_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_2);
            // $path2 = $request->img_2->store('monthly', 'public');
            // $data['img_2'] = $path2;
            $name_img = Str::random(10) . $request->file('img_2')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/monthly/' . $name_img;
            $img = Image::make($request->file('img_2'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path2 = 'monthly/' . $name_img;
            $data['img_2'] = $path2;
        }



        $res = MonthlyTour::where('monthly_tour_id', $id)->update($data);

        return response([
            "data" => $data,
            "messagge" => 'Tour Mensual Actualizado Exitosamente',
            "response" => 200,
            "success" => true,

        ]);

        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Tour Mensual Actualizado Exitosamente',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "messagge" => 'Error: Tour Mensual No Actualizado ',
                "response" => 200,
                "success" => false,

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyTour  $monthlyTour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour =  MonthlyTour::where('monthly_tour_id', $id)->firstOrFail();
        Storage::delete('public/' . $tour->img_1);
        Storage::delete('public/' . $tour->img_2);
        MonthlyTour::where('monthly_tour_id', $id)->delete();
        return response([
            "messagge" => 'Tour Mensual Eliminado Exitosamente',
            "response" => 200,
            "success" => true,

        ]);
    }

    public function showMonthlyTour($id)
    {
        $tour =  MonthlyTour::where('monthly_tour_id', $id)->get();
        return ($tour);
    }
}
