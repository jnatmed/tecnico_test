<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'usuarios';

    // Columnas que se pueden asignar de manera masiva
    protected $fillable = [
        'usuario',
        'contrasenia',
        'tipo_usuario',
        'email',
    ];

    // Relación con Orden
    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'usuario_id');
    }
}
