<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCase extends Model {

    protected $guarded = [];

    use Sluggable;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function path()
    {
        return '/item-cases/' . $this->slug;
    }

    public function sluggable()
    {
        return ['source' => $this->name];
    }
}
