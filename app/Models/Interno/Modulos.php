<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;
    protected $table = 'users.modulo';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ruta',
        'tipo_id',
        'modulo_id',
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

    public function items()
    {
        return $this->belongsToMany(Items::class, 'users.modulo_item', 'id', 'item_id');
    }

}
