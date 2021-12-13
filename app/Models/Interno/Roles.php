<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'leptus.roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'clave_rol',
        'state',
        'created_by',
        'updated_by',
    ];

    public function getDateFormat() {
		return 'Y-d-m H:i:s';
	}
}
