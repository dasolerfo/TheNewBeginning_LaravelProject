<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $users = User::all();
        return view('admin2', compact('users'));

    }
    public function torna()
    {
        return view('index');

    }
    public function edita(int $id)
    {
        $user = User::findOrFail($id);
        return view('edit',compact('user'));

    }


    public function update(Request $request, int $id)
    {

        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'pais' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $attr['name'];
        $user->email = $attr['email'];
        $user->pais = $attr['pais'];

        $user->save();
        return redirect()->route('admin');
    }

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'pais' => 'required'
        ]);
        if($attr['name'] == 'admin' && $attr['email']== 'admin@admin.cat' ){
            $user = User::create([
                'name' => $attr['name'],
                'password' => bcrypt($attr['password']),
                'email' => $attr['email'],
                'pais'=> $attr['pais'],
                'admin' => true
            ]);
    
        }else{
            $user = User::create([
                'name' => $attr['name'],
                'password' => bcrypt($attr['password']),
                'email' => $attr['email'],
                'pais'=> $attr['pais'],
                'admin' => false
            ]);
        }
        if (!Auth::attempt($attr)) {
            return redirect("index")->withSuccess('Ops! Nono');
        }
        return redirect("index");
        
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return redirect("index")->withSuccess('Ops! Nono');
        }
        
        return redirect("index");
        
    }

    public function logout()
    {
        // auth()->user()->tokens()->delete();
        Session::flush();
        Auth::logout();
        return redirect("index");
    }

    public function destroy(int $id){
        $aux = User::findOrFail($id);
        
        return redirect('admin');
    }
}
