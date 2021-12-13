<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;
    protected $table = 'dbo.nombre';
    protected $primaryKey = 'id';

    protected $fillable = [
        'state',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
    ];
}
