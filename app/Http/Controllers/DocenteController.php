<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocenteRequest;
use App\Http\Requests\UpdatedocenteRequest;
use App\Models\docente;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocenteController extends Controller
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
    public function store(StoredocenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocenteRequest $request, docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(docente $docente)
    {
        //
    }
   
}
