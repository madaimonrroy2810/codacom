<?php
 
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Models\Herramienta; 
use App\Http\Controllers\VendedorController;

 
Route::get('/', function () {
    return view('inicio');
})->name('inicio');
 
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
 
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');


Route::get('/herramientas', function () {
    $herramientas = Herramienta::all();
    return view('herramientas.index', ['herramientas' => $herramientas]);
});

Route::get('/herramientas/nuevo', function () {
    return view('herramientas.crear');
});

Route::post('/herramientas/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Escribe el nombre de la herramienta.',
        'precio.required' => 'Escribe el precio de la herramienta.',
        'precio.integer' => 'El precio se anota solo con cifras.',
    ]);

    Herramienta::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/herramientas');
});

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::post('/registro', [VendedorController::class, 'registrar'])->name('vendedor.registrar');
Route::get('/vendedores', [VendedorController::class, 'index'])->name('vendedores.index');
Route::get('/vendedor/{codigo}', [VendedorController::class, 'verificar'])->name('vendedor.verificar');