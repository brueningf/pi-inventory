<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function sluggable()
    {
        return ['source' => 'name'];
    }

    public function path()
    {
        return '/manufactures/' . $this->slug;
    }
}
