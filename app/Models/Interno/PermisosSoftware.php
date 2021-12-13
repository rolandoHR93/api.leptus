<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosSoftware extends Model
{
	use HasFactory;
	protected $table = 'leptus.permisos';

	protected $primaryKey = 'id';

	protected $fillable = [
		'descripcion',
		'nombre_clave',
		'state',
		'created_by',
		'updated_by',
	];

	public function getDateFormat() {
		return 'Y-d-m H:i:s';
	}
}
