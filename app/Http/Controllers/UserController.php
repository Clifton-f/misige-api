<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
    public function index(Request $request){

        /*$incluirPermissoes = $request->query('includePermissions');
        $users = User::with('papeis.nome')->get();*/
        return new UserCollection(User::all());
        
    }
    public function show(User $user){

        return new UserResource($user);
        
    }

}
