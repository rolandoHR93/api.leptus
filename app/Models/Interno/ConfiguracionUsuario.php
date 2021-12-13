<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionUsuario extends Model
{
    use HasFactory;
    protected $table = 'leptus.nombre';
    protected $primaryKey = 'id';

    protected $fillable = [
        'state',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
    ];
}
