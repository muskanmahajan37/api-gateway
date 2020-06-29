<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Model implements AuthenticatableContract, AuthorizableContract,JWTSubject
{
    use Authenticatable, Authorizable;

    protected $fillable = [
        'name', 'email','password', 'image'
    ];

    protected $hidden = [
        'password','email_verified_at','remember_token','created_at','updated_at'
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

    /**
     * @inheritDoc
     */
    public function resolveChildRouteBinding($childType, $value, $field)
    {

    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
