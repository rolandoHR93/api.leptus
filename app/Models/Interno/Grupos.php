<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;

    protected $table = 'users.grupos';

	protected $primaryKey = 'id';

	protected $fillable = [
		'grupo',
		'descripcion',
		'class',
		'color',
		'state',
		'created_by',
		'updated_by',
	];

	public function getDateFormat() {
        $function = new FechaHelper();
        return $function->getDateFormat();
    }
}
