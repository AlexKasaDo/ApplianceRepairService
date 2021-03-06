<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JobsHistory;
use Laratrust\Traits\LaratrustUserTrait;
class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password','status'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function contact(): HasMany
    {
        return $this->hasMany(Contacts::class, 'user_id', 'id');
    }
    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'staff_jobs', 'staff_id', 'event_id');
    }

    public function jobHistory(): HasMany
    {
        return $this->hasMany(JobHistory::class, 'user_id', 'id');
    }

    public function noteJobs(): HasMany
    {
        return $this->hasMany(Note::class, 'user_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImageJob::class,'user_id','id');
    }
}
