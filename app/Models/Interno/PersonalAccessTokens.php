<?php

namespace App\Models\Interno;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessTokens extends SanctumPersonalAccessToken
{
    protected $table = 'dbo.personal_access_tokens';

     /**
     * Limit saving of PersonalAccessToken records
     *
     * We only want to actually save when there is something other than
     * the last_used_at column that has changed. It prevents extra DB writes
     * since we aren't going to use that column for anything.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $changes = $this->getDirty();
        // Check for 2 changed values because one is always the updated_at column
        if (! array_key_exists('last_used_at', $changes) || count($changes) > 2) {
            parent::save();
        }
        return false;
    }

    public function getDateFormat() {
        return 'Y-m-d H:i:s';
    }
}
