<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
use Illuminate\Support\Facades\Storage;

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

Route::post('denuncia2/{denuncianteId}', [ DenunciaController::class, 'crear2' ]);

Route::post('denuncia3/{denuncianteId}', [ DenunciaController::class, 'crear3' ]);

Route::get('/test', function () {
    Storage::put('/hola/holas.txt','textooo');

    return 'hola';
});