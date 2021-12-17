<?php

namespace App\Models\Interno;

use App\Helpers\FechaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = 'users.items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
        'ruta',
        'state',
        'created_by',
        'updated_by',
    ];

    public function getDateFormat() {
        $function = new FechaHelper();
        return $function->getDateFormat();
    }
}
