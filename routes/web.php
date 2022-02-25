<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
use App\Http\Livewire\DenunciaUno;
use App\Http\Livewire\DenunciaViolenciaFamiliar;
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
})->name('home');

Route::get('/denuncia-por-violencia-familiar', DenunciaViolenciaFamiliar::class)->name('denuncia-violencia-familiar');
Route::get('/denuncia-por-apropiacion-ilicita', DenunciaUno::class)->name('denuncia-apropiacion-ilicita');

Route::get('/formulario', function () {
    return view('denuncia.index');
});
Route::post('denuncia', [ DenunciaController::class, 'crear' ]);

Route::post('denuncia2/{denuncianteId}', [ DenunciaController::class, 'crear2' ]);

Route::post('denuncia3/{denuncianteId}', [ DenunciaController::class, 'crear3' ]);
