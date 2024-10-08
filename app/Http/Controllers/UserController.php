<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Http\Requests\V1\StoreUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
    public function index(Request $request){

        /*$incluirPermissoes = $request->query('includePermissions');
        $users = User::with('papeis.nome')->get();*/
        //return new UserCollection(User::all());
        return new UserCollection(User::all());
        
    }
    public function show(User $user){

        
        return new UserResource($user);
        
    }
    public function store(StoreUser $request){
        /*$fields = $request->validate([
            'nome'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'BI'=>'required',
            'NUIT'=>'required',
            'contacto_1'=>'required|max:11',
            'contacto_2'=>'max:11'
            ]);
            $user=User::create($fields);
            $token = $user->createToken($request->name);
            return $fields;*/

            return new UserResource(User::create($request->all()));
    }

    
}
