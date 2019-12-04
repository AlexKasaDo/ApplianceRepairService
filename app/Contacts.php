<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function userAdded(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id' );
    }
    public function job(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class, 'contact_id', 'id');
    }
}