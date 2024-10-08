<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Papel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate([
        'nome'=>'required|max:255',
        'email'=>'required|email|unique:users',
        'password'=>'required',
        'BI'=>'required',
        'NUIT'=>'required',
        'contacto_1'=>'required|max:11',
        'contacto_2'=>'max:11'
        ]);
        $user=User::create($fields);
        $token = $user->createToken($request->name,'jjj',);
        return [
            'user'=>$user,
            'token'=>$token->plainTextToken

    ];
    }
    public function login(Request $request){
        $request->validate([
            "email"=>"|required|email",
            "password"=>"required"
        ]);
        $user = User::where('email',$request->email)->first();

        
        if(!$user || !Hash::check($request->password,$user->password)){
            return [
                'message'=>'As credenciais que providenciou estão erradas'
            ];
            
        }

        
         
         $userResource = new UserResource($user);

        $token = $user->createToken($user->nome,$userResource->getPermissoes());
        return [
            'user'=>$userResource,
            
            'token'=>$token->plainTextToken

    ];
    }
    public function logout(Request $request){
        $request -> user()->tokens()->delete();
        return[
            'message'=>'Logout feito com sucesso'
        ];
    }
}
