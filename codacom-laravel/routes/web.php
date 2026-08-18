<?php
 
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Rutas de CodaCom
|--------------------------------------------------------------------------
| Sin base de datos por ahora: solo vistas Blade + un formulario que se
| valida y se procesa con un Controller (reemplaza al viejo procesar.php).
*/
 
Route::get('/', function () {
    return view('inicio');
})->name('inicio');
 
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
 
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');