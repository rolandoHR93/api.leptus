<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosModel extends Model
{
	use HasFactory;
	protected $table = 'users.servicios';
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

	public function getDateFormat() {
        $function = new FechaHelper();
        return $function->getDateFormat();
    }

	public function gruposervicios()
	{
		return $this->belongsToMany(gruposervicios::class, 'users.grupo_servicios', 'servicios_id', 'gruposervicios_id');
	}
}
