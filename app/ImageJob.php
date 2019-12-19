<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageJob extends Model
{
    protected $fillable = ['user_id', 'jod_id', 'description', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

}
