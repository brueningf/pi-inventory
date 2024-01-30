<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];
    protected $appends = ['path'];

    public function items()
    {
       return $this->belongsToMany(Item::class);
    }

    public function path()
    {
        return '/projects/' . $this->slug;
    }

    public function sluggable()
    {
        return ['source' => $this->name];
    }

    public function getPathAttribute()
    {
        return $this->path();
    }
}
