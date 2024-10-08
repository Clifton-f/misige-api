<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissaoRequest;
use App\Http\Requests\UpdatePermissaoRequest;
use App\Http\Resources\V1\PermissaoResouce;
use App\Models\Permissao;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Permissao::all();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permissao $permissao)
    {
        //
        return new PermissaoResouce($permissao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissaoRequest $request, Permissao $permissao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permissao $permissao)
    {
        //
    }
    
}
