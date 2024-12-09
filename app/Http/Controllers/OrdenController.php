<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\EstadoOrden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function listarOrdenes($userId)
    {
        try {
            // Obtener todas las órdenes del usuario con su estado usando relaciones Eloquent
            $ordenes = Orden::where('usuario_id', $userId)
                ->with('estadoOrden') // Relación definida en el modelo
                ->get();
    
            // Pasar los datos a la vista 'ordenes.index'
            return view('ordenes.index', ['ordenes' => $ordenes]);
    
        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json(['error' => "Error al obtener las órdenes de trabajo: " . $e->getMessage()], 500);
        }
    }
}
