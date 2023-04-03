<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (Gallery::all());
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
        ]);
        $directory = storage_path() . '/app/public/gallery/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        }
        
        $data = ($request->all());
        if ($request->hasFile('img_1')) {    
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/gallery/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'gallery/' . $name_img;
            $data['img_1'] = $path1;

        } else {
            return response([
                "response" => '500',
                "success" => false,
                "messagge"=>'No existe una imagen',
            ]);
        }


        $data['img_1'] = $path1;
        $data['created_at'] = Carbon::now();

        $res = Gallery::insert($data);
        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Imagen Agregada a Galeria',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Imagen No Agregado a Galeria',
                "response" => 500,
                "success" => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ($request->all());
        if ($request->hasFile('img_1')) {
            $tour =  Gallery::where('gallery_id', $id)->firstOrFail();
            Storage::delete('public/' . $tour->img_1);
            // $path1 = $request->img_1->store('catalogue', 'public');
            // $data['img_1'] = $path1;
            $name_img = Str::random(10) . $request->file('img_1')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/gallery/' . $name_img;
            $img = Image::make($request->file('img_1'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'gallery/' . $name_img;
            $data['img_1'] = $path1;
        }

        $res = Gallery::where('gallery_id', $id)->update($data);
        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Imagen Acualizada Exitosamente',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "messagge" => 'Error: Imagen No Actualizada',
                "response" => 200,
                "success" => false,

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour =  Gallery::where('gallery_id', $id)->firstOrFail();
        Storage::delete('public/' . $tour->img_1);
        Storage::delete('public/' . $tour->img_2);
        Gallery::where('gallery_id', $id)->delete();
        return response([
            "messagge" => 'Imagen Eliminada Exitosamente',
            "response" => 200,
            "success" => true,
        ]);
    }

    public function showGallery($id)
    {
        $tour =  Gallery::where('gallery_id', $id)->get();
        return ($tour);
    }
}