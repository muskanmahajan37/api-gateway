<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Role extends Model
{

    public function resolveChildRouteBinding($childType, $value, $field)
    {
        // TODO: Implement resolveChildRouteBinding() method.
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
