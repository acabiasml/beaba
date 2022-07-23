<?php

namespace App\Http\Controllers;

use App\Models\Diario;
use App\Http\Requests\StoreDiarioRequest;
use App\Http\Requests\UpdateDiarioRequest;

class DiarioController extends Controller
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
     * @param  \App\Http\Requests\StoreDiarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diario  $diario
     * @return \Illuminate\Http\Response
     */
    public function show(Diario $diario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diario  $diario
     * @return \Illuminate\Http\Response
     */
    public function edit(Diario $diario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiarioRequest  $request
     * @param  \App\Models\Diario  $diario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiarioRequest $request, Diario $diario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diario  $diario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diario $diario)
    {
        //
    }
}
