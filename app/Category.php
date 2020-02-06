<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $with = ['items'];

    public function path()
    {
        return '/categories/' . $this->id;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
