<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoServicios extends Model
{
    use HasFactory;
    protected $table = 'grupoServicios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_grupo',
        'descripcion',
        'num_orden',
        'meses',
        'precio',
        'state',
        'created_by',
        'updated_by',
    ];
}
