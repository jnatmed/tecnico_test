<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    // Nombre de la tabla
    protected $table = 'ordenes';

    // Columnas que se pueden asignar de manera masiva
    protected $fillable = [
        'tipoServicio',
        'fechaEmision',
        'apellido',
        'nombre',
        'grado',
        'credencial',
        'division',
        'seccion',
        'email',
        'observaciones',
        'pathOrden',
        'estado_orden_id',
        'usuario_id',
        'trabajos_realizados',
        'motivo_rechazo',
    ];

    // Relación con EstadoOrden
    public function estadoOrden()
    {
        return $this->belongsTo(EstadoOrden::class, 'estado_orden_id');
    }

    // Relación con Usuario (asumiendo que tienes un modelo Usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}
