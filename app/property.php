<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class property extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'slug',
        'price',
        'size',
        'bedroom',
        'bathroom',
        'image',
        'video',
        'featured',
        'status',
        'new_development',
        'location',
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
