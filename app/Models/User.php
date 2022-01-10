<?php

namespace App\Models;

use App\Helpers\FechaHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'dbo.users';
	// public $timestamps = false;

	protected $fillable = [
		'nombres',
		'apellidos',
		'email',
		'password',
		'last_signIn_at',
        'empresa_id',
        'email_verified_at',
		'token_activate',
		'state',
        'created_by',
        'updated_by',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getDateFormat() {
        $function = new FechaHelper();
        return $function->getDateFormat();
    }
}
