<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function properties()
    {

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
