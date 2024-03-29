<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Followable;
use App\Traits\Hideable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, Followable, Hideable;


//    public function getRouteKeyName(): string
//    {
//        return 'id';
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'description',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'followable');
    }
    public function followedUsers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function hides()
    {
        return $this->morphMany(Hide::class, 'hideable');
    }
    public function hidededUsers()
    {
        return $this->morphMany(Hide::class, 'hideable');
    }

    public function hideders()
    {
        return $this->morphMany(Hide::class, 'hideable');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
