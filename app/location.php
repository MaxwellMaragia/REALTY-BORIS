<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function properties()
    {
        return $this->hasMany(property::class,'location');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
