<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario', function () {
    return view('denuncia.index');
});
Route::post('denuncia', [ DenunciaController::class, 'crear' ]);

Route::post('denuncia2', [ DenunciaController::class, 'crear2' ]);

