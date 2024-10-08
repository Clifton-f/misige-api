<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\V1\UserResource;
use App\Models\Papel;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public function getPermissoes() :array{
        $lista = [];
        $papel = Papel::where('id', $this->papel_id)->with('permissao')->first();

        foreach($papel->permissao as $permissao){
            $lista[]=$permissao->nome;
        }
        return $lista;
     }
    public function toArray(Request $request)
    {
        
        return $this->collection;
        
    }
}
