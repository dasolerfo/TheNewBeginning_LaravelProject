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

//Route::resource('admin', AuthController::class);


Route::get('admin', [AuthController::class, 'index'])->name('admin'); 
Route::get('index', [AuthController::class, 'torna'])->name('index'); 
Route::delete('delete/{id}', [AuthController::class, 'destroy'])->name('delete'); 
Route::get('show/{id}', [AuthController::class, 'edita'])->name('edita'); 
Route::post('change/{id}', [AuthController::class, 'update'])->name('aaaaa'); 

Route::post('post-login', [AuthController::class, 'login'])->name('login.post'); 
Route::post('post-registration', [AuthController::class, 'register'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('index');
});
// Route::get('/admin/{lang}', function ($lang) {
//     App::setlocale($lang);
//     return route('admin');
// });
