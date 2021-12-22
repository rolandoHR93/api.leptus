<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'users.Persona';

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
		$function = new FechaHelper();
		return $function->getDateFormat();
	}

    public function users()
	{
		return $this->belongsToMany(User::class, 'users.Persona_user', 'id_persona', 'id_user');
	}

    public function Modulo()
    {
        return $this->belongsToMany(Modulos::class, 'users.persona_modulo', 'persona_id', 'modulo_id');
    }

}
