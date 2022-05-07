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

class AuthController extends Controller
{
    use ApiResponser;
    // public function __construct()
    // {
    //     $this->middleware(Language::class);
    // }


    public function getUsers()
    {
        if(Auth::user()->admin == 1){
            $users = User::all();
            return view('admin2', compact('users'));
        }else{
            return view('index')->withSuccess('No ets administrador!');
        }
        

    }
    //getPerfil
    public function getPerfil(){
        $user = User::findOrFail(Auth::user()->id);
        $user->game;
        return view('edit',compact('user'));
    }
    public function torna()
    {
        return view('index');

    }
    public function edita(int $id)
    {
        $user = User::findOrFail($id);
        $user->game;
        return view('edit',compact('user'));
    }


    public function update(Request $request, int $id)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'userName' => 'required|string|max:10',
            'email' => 'required|string|email',
            'pais' => 'required',
            'puntuacio' => 'numeric|min:0'
        ]);
        $user = User::findOrFail($id);
        $user->fill($request->all())->save();
        $game  = $user->game;
        $game->puntuacio = $attr["puntuacio"];
        $game->save();
        if(Auth::user()->admin == 1){
            return redirect()->route('admin');
        }else{
            return redirect()->route('torna');
        }
    }

    public function register(Request $request)
    {
        $attr = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'userName' => 'required|string|max:10|unique:users,userName',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'pais' => 'required'
        ]);
        if($attr->fails()){
            return redirect("index")->withSuccess('Ops! Dades incorrectes');
        }
        
        $game = Game::create(['puntuacio' => 0]);

        $user = User::create([
            'name' => $request['name'],
            'userName' =>$request['userName'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'pais'=> $request['pais'],
            'admin' => false
        ]);
        $user->gameId = $game->id;
        $user->save();
        $user->createToken('API Token')->plainTextToken;

        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect("index")->withSuccess('Ops! Nono');
        }
        
        return redirect("index");
        
    }

    public function login(Request $request)
    {
        $attr =  Validator::make($request->all(), [
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);
        if($attr->fails()){
            return redirect("index")->withSuccess('Ops! Dades incorrectes');
        }
        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect("index")->withSuccess('Ops! Usuari no trobat');
        }
        
        return redirect("index");
        
    }

    public function ranking(){
        $users = \DB::table('users')
            ->join('games','users.gameId','=','games.id')
            ->select('users.*','games.puntuacio as puntuacio')
            ->orderBy('games.puntuacio','desc')
            ->get();
        
        return view('ranking',compact('users'));
        
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        // auth()->user()->tokens()->delete();

        return redirect()->route('torna');
    }

    public function elimina(int $id){
        $aux = User::findOrFail($id);
        $aux->delete();

        return redirect('admin');
    }
}
