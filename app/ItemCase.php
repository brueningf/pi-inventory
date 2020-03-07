<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCase extends Model {

    use Sluggable;

    public function item()
    {
        return $this->belongsToMany(Item::class);
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
