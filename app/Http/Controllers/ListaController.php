<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaController extends Controller
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
    // public function store(Request $request)
    // {
        
    //      $data['monthly_tour_id'] = $request->monthly_tour_id;
    //      $data['description'] = $request->tour_destiny;
    //      $data['status'] = "1";
    //      $data['created_at'] = now();
    //      $data['updated_at'] = now();
        
    //      Lista::insert($data);
    //      $list =  Lista::orderby('created_at','desc') ->first();
    //     //  return $list->list_id;

    //     //  if($list == 1){
    //      if($list){
    //         return response([
    //             "data" => $data,
    //             "message" => 'LISTA Generada Exitosamente.',
    //             "response" => 200,
    //             "success" => true,
    //         ]);
    //      }else {
    //         return response([
    //             "data" => $data,
    //             "messagge" => 'Error Al Generar LISTA.',
    //             "response" => 500,
    //             "success" => false,
    //         ]);
    //     }

    // }

    public function store(Request $request)
    {
        
         $data['monthly_tour_id'] = $request->monthly_tour_id;
         $data['description'] = $request->tour_destiny;
         $data['status'] = "1";
         $data['status_list'] = "Activo";
         $data['created_at'] = now();
         $data['updated_at'] = now();
        
         Lista::insert($data);
         $list =  Lista::orderby('created_at','desc') ->first();
        //  return $list->list_id;

        //  if($list == 1){
         if($list){
            return response([
                "data" => $data,
                "message" => 'LISTA Generada Exitosamente.',
                "response" => 200,
                "success" => true,
            ]);
         }else {
            return response([
                "data" => $data,
                "messagge" => 'Error Al Generar LISTA.',
                "response" => 500,
                "success" => false,
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista, $lists_id)
    {
        try {
            DB::table('listas')
                ->where('list_id', $lists_id)
                ->update(['status_list' => 'Inactivo']);

            return response([
                "message" => 'Lista eliminada con éxito',
                "response" => 200,
                "success" => true,
            ]);
        } catch (\Exception $e) {
            return response([
                "message" => 'Error al ELIMINAR lista',
                "response" => 500,
                "success" => false,
            ]);
        }
    }
}
