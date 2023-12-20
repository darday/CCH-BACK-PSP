<?php

namespace App\Http\Controllers;

use App\Models\PassengerList;
use Illuminate\Http\Request;

class PassengerListController extends Controller
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
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function show(PassengerList $passengerList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function edit(PassengerList $passengerList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassengerList $passengerList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassengerList  $passengerList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassengerList $passengerList)
    {
        //
    }
}
