<?php

namespace App\Http\Resources\V1;

use App\Models\Papel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


     public function getPermissoes() :array{
        $lista = [];
        $papel = Papel::where('id', $this->papel_id)->with('permissao')->first();

        foreach($papel->permissao as $permissao){
            $lista[]=$permissao->nome;
        }
        return $lista;
     }

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nome'=>$this->nome,
            'email'=>$this->email,
            'BI'=>$this->BI,
            'NUIT'=>$this->NUIT,
            'contacto'=>[$this->contacto_1,$this->contacto_1],
            'papel' => new PapelResource(Papel::where('id',$this->papel_id)->first()),
            'permissoes'=> UserResource::getPermissoes()//Papel::where('id', $this->papel_id)->with('permissao')->first()UserResource::getPermissoes()

        ];
        
    }
    
}
