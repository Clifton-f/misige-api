<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

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
        $token = $user->createToken($request->name);
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

        $token = $user->createToken($user->nome);
        return [
            'user'=>$user,
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
