<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function path()
    {
        return '/providers/' . $this->id;
    }
}
