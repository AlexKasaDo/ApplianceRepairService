<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'is_active', 'description',
        'default_appointment_length', 'typical_cost', '
        background_color', 'text_color',
        ];

    public function job(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class,
                              'service_id',
                              'id');
    }
}
