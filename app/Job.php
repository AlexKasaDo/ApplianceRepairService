<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $fillable = ['service_id', 'contact_id', 'event_id', 'status_id', 'description', 'scope_of_work'];

    public function event ()
    {
        return $this->hasMany(Event::class, 'job_id', 'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,
                                'service_id',
                                'id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contacts::class,
                                'contact_id',
                                'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusJob::class,
                                'status_id',
                                'id');
    }

    public function history(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobHistory::class,
                              'job_id',
                              'id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'job_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImageJob::class,'job_id','id');
    }


}
