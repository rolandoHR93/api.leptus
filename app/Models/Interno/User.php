<?php

namespace App\Models\Interno;

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
		'state',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getDateFormat() {
		return 'Y-d-m H:i:s';
	}
}
