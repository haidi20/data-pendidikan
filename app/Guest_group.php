<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest_group extends Model
{
    protected $table = 'guest_group';

    public $fillable = ['id', 'name'];
}
