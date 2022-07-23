<?php

namespace App\Http\Controllers;

use App\Models\Frequencia;
use App\Http\Requests\StoreFrequenciaRequest;
use App\Http\Requests\UpdateFrequenciaRequest;

class FrequenciaController extends Controller
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
     * @param  \App\Http\Requests\StoreFrequenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFrequenciaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frequencia  $frequencia
     * @return \Illuminate\Http\Response
     */
    public function show(Frequencia $frequencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frequencia  $frequencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Frequencia $frequencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFrequenciaRequest  $request
     * @param  \App\Models\Frequencia  $frequencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFrequenciaRequest $request, Frequencia $frequencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frequencia  $frequencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frequencia $frequencia)
    {
        //
    }
}
