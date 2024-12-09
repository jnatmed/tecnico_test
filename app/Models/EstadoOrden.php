<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOrden extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'estado_ordenes';

    // Columnas que se pueden asignar de manera masiva
    protected $fillable = [
        'descripcion_estado',
    ];

    // Relación con Orden
    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'estado_orden_id');
    }
}
