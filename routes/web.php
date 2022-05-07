<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('ranking', [AuthController::class, 'ranking'])->name('ranking'); 
Route::get('index', [AuthController::class, 'torna'])->name('torna'); 
Route::post('post-login', [AuthController::class, 'login'])->name('login.post'); 
Route::post('post-registration', [AuthController::class, 'register'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout.post');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::get('/admin', [AuthController::class, 'getUsers'])->name('admin'); 
    Route::get('/user', [AuthController::class, 'getPerfil'])->name('user'); 

    Route::delete('/delete/{id}', [AuthController::class, 'elimina'])->name('delete'); 
    Route::get('/show/{id}', [AuthController::class, 'edita'])->name('edita'); 
    Route::post('/change/{id}', [AuthController::class, 'update'])->name('aaaaa'); 

});
Route::get('/{lang}', function ($lang) {
    App::setlocale($lang);
    //Session::put('lang',$lang);
    return view('index');
});
Route::get('/', function (){
    //Session::put('lang','cat');
    
    return view('index');
});
