<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCase extends Model
{
    public function item()
    {
        return $this->belongsToMany(Item::class);
    }
}
