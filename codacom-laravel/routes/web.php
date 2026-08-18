<?php
 
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
 

 
Route::get('/', function () {
    return view('inicio');
})->name('inicio');
 
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
 
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');