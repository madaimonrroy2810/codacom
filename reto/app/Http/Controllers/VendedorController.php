<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VendedorController extends Controller
{
    public function index()
{
    $vendedores = Vendedor::all();
    return view('vendedores.index', compact('vendedores'));
}
    public function registrar(Request $request)
{
    $datos = $request->validate([
        'nombre_completo' => 'required|string|max:100',
        'ci'              => 'required|string|max:15|unique:vendedores,ci',
        'telefono'        => 'required|string|max:20|unique:vendedores,telefono',
        'nombre_negocio'  => 'required|string|max:100',
        'tipo_producto'   => 'required|string',
        'foto_carnet'     => 'required|string',
        'foto_frente'     => 'required|string',
        'foto_izquierda'  => 'required|string',
        'foto_derecha'    => 'required|string',
        'stock'            => 'required|integer|min:0',
    ], [
        'ci.unique'                => 'Este carnet ya está registrado.',
        'telefono.unique'          => 'Este número de WhatsApp ya está registrado.',
        'foto_carnet.required'     => 'Falta la foto de tu carnet.',
        'foto_frente.required'     => 'Falta la foto de frente.',
        'foto_izquierda.required'  => 'Falta la foto de lado izquierdo.',
        'foto_derecha.required'    => 'Falta la foto de lado derecho.',
        'stock.required' => 'Debes indicar el stock o cupos disponibles.',
    'stock.integer'  => 'El stock debe ser un número entero.',
    'stock.min'      => 'El stock no puede ser negativo.',
    ]);

    // convierte cada base64 (que llega desde la cámara) en un archivo .jpg real
    foreach (['foto_carnet', 'foto_frente', 'foto_izquierda', 'foto_derecha'] as $campo) {
        $imagen = str_replace('data:image/jpeg;base64,', '', $datos[$campo]);
        $nombreArchivo = 'documentos/' . Str::random(12) . '.jpg';
        Storage::disk('public')->put($nombreArchivo, base64_decode($imagen));
        $datos[$campo] = $nombreArchivo;
    }

    $vendedor = Vendedor::create([
        ...$datos,
        'codigo_verificacion' => strtoupper(Str::random(6)),
        'estado' => 'pendiente',
    ]);

    return back()->with(
        'exito',
        "¡Gracias, {$vendedor->nombre_completo}! Tu solicitud fue registrada. Código: #{$vendedor->codigo_verificacion}."
    );
}

    public function verificar($codigo)
{
    $vendedor = Vendedor::where('codigo_verificacion', $codigo)->firstOrFail();
    return view('vendedores.verificado', compact('vendedor'));
}
}