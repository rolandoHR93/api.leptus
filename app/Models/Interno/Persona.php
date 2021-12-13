<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'leptus.Persona';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'search',
        'state',
        'created_by',
        'updated_by',
    ];

    public function getDateFormat() {
		return 'Y-d-m H:i:s';
	}
}
