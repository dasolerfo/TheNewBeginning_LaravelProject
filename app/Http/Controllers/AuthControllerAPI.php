<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Validator;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthControllerAPI extends Controller
{    
    use ApiResponser;


    public function loginAPI(Request $request)
    {
        $attr =  Validator::make($request->all(), [
            'userName' => 'required|string',
            'password' => 'required|string'
        ]);
        if($attr->fails()){
            return $this->error('Escriu be', 401);
        }
        
        if (!Auth::attempt(['userName' => $request['userName'], 'password' => $request['password']])) {
            return $this->error('Credentials not match', 401);
        }
        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }
    public function puntuacio(Request $request, int $puntuacio){
        //dd(Auth::user()->game->puntuacio);
        $game  = Auth::user()->game;
        $game->puntuacio += $puntuacio;
        $game->save();
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    public function retornaGame(){
        $users = User::all();
        dd($users[1]->all()->game);
    }
}
