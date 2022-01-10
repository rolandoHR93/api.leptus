<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FechaHelper;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'users.Empresa';

	protected $primaryKey = 'id';

    protected $fillable = [
		'Tipo_Documento',
		'NroDocumento',
		'Ubigeo_id',
		'Direccion',
		'NroContacto',
		'RazonSocial',
		'NombreComercial',
		'state',
		'created_by',
		'updated_by',
	];

    public function getDateFormat() {
		$function = new FechaHelper();
		return $function->getDateFormat();
	}


}
