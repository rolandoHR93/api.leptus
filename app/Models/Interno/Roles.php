<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'users.roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'clave_rol',
        'meses',
        'state',
        'created_by',
        'updated_by',
    ];
}
