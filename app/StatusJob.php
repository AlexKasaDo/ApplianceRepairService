<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusJob extends Model
{
    protected $fillable = ['name'];

    public function job(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class, 'status_id', 'id');
    }
}
