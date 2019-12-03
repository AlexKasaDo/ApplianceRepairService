<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    protected $table = 'jobs_history';
    protected $fillable = ['job_id', 'user_id', 'action', 'component'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
