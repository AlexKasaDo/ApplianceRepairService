<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
            protected $fillable = [
        'name',
        'phone',
        'email',
        'instruction',
        'address_address',
        'address_latitude',
        'address_longitude',
        'address_longitude',
        ];
}
