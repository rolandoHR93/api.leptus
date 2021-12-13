<?php

namespace App\Models\Interno;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessTokens extends Model
{
    use HasFactory;
    protected $table = 'dbo.personal_access_tokens';

    public function getDateFormat() {
        return 'Y-m-d H:i:s';
    }
}
