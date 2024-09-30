<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePapelRequest;
use App\Http\Requests\UpdatePapelRequest;
use App\Models\Papel;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $papel = Papel::with('permissao')->get();
        
        return $papel;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data =$request->validate([
            'nome'=>'required|max:255',
            'descricao'=>'required'
        ]);
        
        $papel = Papel::create($data);

        return $papel;
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Papel $papel)
    {
        //->with('permissao')->get('*');

        
    
        return $papel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePapelRequest $request, Papel $papel)
    {
        //
        $data =$request->validate([
            'nome'=>'required|max:255',
            'descricao'=>'required'
        ]);
        
        $papel->update($data);

        return $papel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Papel $papel)
    {
        //
        $papel->delete();
        return 'Papel eliminado';
    }

   
}
