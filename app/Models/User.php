<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Info;
use App\Models\Discussion;
use App\Models\Response;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'social_name',
        'cpf',
        'birth_date',
        'state',
        'city',
        'user_type',
        'password',    
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
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function($user) {
            $user -> info() -> create();
        });
    }

    public function info()
    {
        return $this-> hasOne("\App\Models\Info");
    }

    public function discussion()
    {
        return $this-> hasMany("\App\Models\Discussion");
    }

    public function response()
    {
        return $this-> hasMany("\App\Models\Response");
    }

}
