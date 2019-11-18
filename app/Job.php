<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $fillable = ['service_id', 'contact_id', 'event_id', 'status_id', 'description', 'scope_of_work'];
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'contact_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusJob::class,'status_id','id');
    }
}
