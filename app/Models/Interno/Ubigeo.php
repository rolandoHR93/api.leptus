<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;
    protected $table = 'dbo.Ubigeo';
    protected $primaryKey = 'UNION';

    protected $fillable = [
        'COD_DEPARTAMENTO',
        'COD_PROVINCIA',
        'COD_DISTRITO',
        'UNION',
        'DEPARTAMENTO',
        'PROVINCIA',
        'DISTRITO',
    ];
}
