<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosModel extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_servicio',
        'descripcion',
        'nombre_clave',
        'precio',
        'stock',
        'stock',
        'flag',
        'state',
        'created_by',
        'updated_by',
    ];
}
