<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NodeRedData;

class NodeRedController extends Controller
{
    public function handle(Request $request)
    {
        // Obtén los datos agrupados enviados desde Node-RED
        $datosAgrupados = $request->json()->all();

        // Busca un registro existente en la base de datos
        $registroExistente = NodeRedData::first();

        // Si existe un registro, actualiza sus datos; sino crea uno nuevo
        if ($registroExistente) {
            $registroExistente->update([
                'temperatura' => $datosAgrupados['temperatura'],
                'voltaje' => $datosAgrupados['voltaje'],
                'intensidad_luz' => $datosAgrupados['intensidadLuz'],
                'distancia' => $datosAgrupados['distancia'],
            ]);
        } else {
            NodeRedData::create([
                'temperatura' => $datosAgrupados['temperatura'],
                'voltaje' => $datosAgrupados['voltaje'],
                'intensidad_luz' => $datosAgrupados['intensidadLuz'],
                'distancia' => $datosAgrupados['distancia'],
            ]);
        }
        return $datosAgrupados;
    }

    public function mostrarDatos()
    {
        // Obtener todos los datos de la base de datos
        $datos = NodeRedData::all();

        // Pasar los datos a la vista
        return view('index', ['datos' => $datos]);
    }
}
