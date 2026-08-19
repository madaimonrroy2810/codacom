<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Procesa el formulario de contacto.
     * Reemplaza al antiguo procesar.php: valida los datos y
     * los guarda en la tabla "contactos" usando el modelo Contacto.
     */
    public function enviar(Request $request)
    {
        $datos = $request->validate([
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email',
            'negocio' => 'nullable|string',
            'mensaje' => 'required|string',
        ]);

        Contacto::create($datos);

        return back()->with('exito', '¡Gracias, ' . $datos['nombre'] . '! Tu mensaje fue recibido y guardado correctamente.');
    }
}