<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable as Notifiable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, Notifiable;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email','password', 'image','active', 'activation_token'
    ];

    protected $hidden = [
        'password','email_verified_at','remember_token','created_at','updated_at','activation_token'
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function languages(){
        return $this->hasMany(Language::class);
    }
    public function educations(){
        return $this->hasMany(Education::class);
    }
    public function certifications(){
        return $this->hasMany(Certification::class);
    }

}
