<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Http\Requests\StoreEscolaRequest;
use App\Http\Requests\UpdateEscolaRequest;

class EscolaController extends Controller
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
     * @param  \App\Http\Requests\StoreEscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEscolaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escola  $escola
     * @return \Illuminate\Http\Response
     */
    public function show(Escola $escola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escola  $escola
     * @return \Illuminate\Http\Response
     */
    public function edit(Escola $escola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEscolaRequest  $request
     * @param  \App\Models\Escola  $escola
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEscolaRequest $request, Escola $escola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escola  $escola
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escola $escola)
    {
        //
    }
}