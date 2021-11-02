<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class property extends Model
{

    protected $fillable = [
        'location',
        'price',
        'size',
        'bedroom',
        'bathroom',
        'image',
        'featured',
        'status',
        'new_development',
        'description',
        'completion_date',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
    ];



    public function features()
    {
        return $this->belongsToMany('App\feature','property_features');
    }

    public function property_location(){
        return $this->belongsTo(location::class,'location');
    }

}
