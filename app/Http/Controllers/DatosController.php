<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function procesar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'edad' => 'required|integer',
        ]);

        return response()->json([
            'mensaje' => "Hola, {$validated['nombre']}. Tienes {$validated['edad']} anos."
        ]);
    }
}


