<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudanteRequest;
use App\Http\Requests\UpdateEstudanteRequest;
use App\Models\Estudante;
use App\Http\Resources\V1\EstudanteResource;
class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstudanteRequest $request)
    {
        //
        return new EstudanteResource($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudante $estudante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstudanteRequest $request, Estudante $estudante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudante $estudante)
    {
        //
    }
}
