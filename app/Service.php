<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name'];

    public function job(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class, 'service_id','id');
    }
}
