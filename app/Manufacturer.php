<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function sluggable()
    {
        return ['source' => $this->name];
    }

    public function path()
    {
        return '/manufacturers/' . $this->slug;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
