<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $with = ['subcategories'];

    protected $appends = ['path'];

    protected $guarded = [];

    public function path()
    {
        return '/categories/' . $this->id;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function subcategories() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentCategory() {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function getPathAttribute()
    {
        return $this->path();
    }
}
