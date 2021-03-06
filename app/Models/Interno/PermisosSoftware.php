<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosSoftware extends Model
{
	use HasFactory;
	protected $table = 'users.permisos';

	protected $primaryKey = 'id';

	protected $fillable = [
		'descripcion',
		'nombre_clave',
		'state',
		'created_by',
		'updated_by',
	];

	public function getDateFormat() {
		$function = new FechaHelper();
		return $function->getDateFormat();
	}
}
