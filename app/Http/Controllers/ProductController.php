<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::orderBy('Description', 'asc')->get();
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.categories_id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.suppliers_id')
            ->select('suppliers.name_store as supplier', 'categories.description as category', 'products.*')
            ->orderBy('products.description')
            ->get();

        return $product;
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
        $data = ($request->all());

        $directory = storage_path() . '/app/public/products/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        }

        if ($request->hasFile('img')) {

            $name_img = Str::random(10) . $request->file('img')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/products/' . $name_img;
            $img = Image::make($request->file('img'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'products/' . $name_img;
            $data['img'] = $path1;
            $data['img'] = $path1;
        }

        $data['created_at'] = Carbon::now();


        $res = Product::insert($data);

        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Producto Agregado Exitosamente.',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Error Producto No Agregado.',
                "response" => 500,
                "success" => false,

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $data = ($request->all());

        $directory = storage_path() . '/app/public/products/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); // Crea la carpeta con permisos 0777 y habilita la creación de carpetas anidadas
        }

        

        if ($request->hasFile('img')) {
            $prod =  Product::where('product_id', $id)->firstOrFail();
            Storage::delete('public/' . $prod->img_1);

            $name_img = Str::random(10) . $request->file('img')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/products/' . $name_img;
            $img = Image::make($request->file('img'));
            $img->orientate();
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
            $img->destroy();


            $path1 = 'products/' . $name_img;
            $data['img'] = $path1;
            $data['img'] = $path1;
        }

        $data['updated_at'] = Carbon::now();

        $res = Product::where('product_id', $id)->update($data);    

        if ($res == 1) {
            return response([
                "data" => $data,
                "messagge" => 'Producto Editado Exitosamente.',
                "response" => 200,
                "success" => true,

            ]);
        } else {
            return response([
                "data" => $data,
                "messagge" => 'Error Producto No Editado.',
                "response" => 500,
                "success" => false,

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::where('product_id', $id)->firstOrFail();
        Storage::delete('public/' . $product->img);
        $resp = Product::where('product_id', $id)->delete();
        if ($resp == 1) {
            return ([
                "messagge" => 'Producto eliminado exitosamente',
                "response" => '200',
                "success" => true,
            ]);
        } else {
            return ([
                "messagge" => 'Producto ya eliminado',
                "response" => '500',
                "success" => false,
            ]);
        }
    }
}
