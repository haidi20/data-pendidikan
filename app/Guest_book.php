<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest_book extends Model
{
    protected $cast     = ['created_at', 'date'];
    protected $table    = 'guest_book';

    public function scopeBaseGuestGroup($query, $guestGroup)
    {
        return $query->where('guest_group_id', $guestGroup);
    }
}
