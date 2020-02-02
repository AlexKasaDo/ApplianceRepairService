<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['start_date', 'end_date', 'text', 'status_id','type_id','job_id'];

    public function job ()
    {
        return $this->belongsTo(Job::class);
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EventType::class, 'type_id', 'id');
    }

    public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'staff_jobs', 'event_id', 'staff_id');
    }
}
