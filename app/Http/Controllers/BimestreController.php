<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Http\Requests\StoreBimestreRequest;
use App\Http\Requests\UpdateBimestreRequest;

class BimestreController extends Controller
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
     * @param  \App\Http\Requests\StoreBimestreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBimestreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bimestre  $bimestre
     * @return \Illuminate\Http\Response
     */
    public function show(Bimestre $bimestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bimestre  $bimestre
     * @return \Illuminate\Http\Response
     */
    public function edit(Bimestre $bimestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBimestreRequest  $request
     * @param  \App\Models\Bimestre  $bimestre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBimestreRequest $request, Bimestre $bimestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bimestre  $bimestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bimestre $bimestre)
    {
        //
    }
}
