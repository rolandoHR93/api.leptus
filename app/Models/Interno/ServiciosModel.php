<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosModel extends Model
{
    use HasFactory;
    protected $table = 'leptus.servicios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_servicio',
        'descripcion',
        'nombre_clave',
        'precio',
        'stock',
        'flag',
        'delete_comentario',
        'delete',
        'state',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
    ];
}
