<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    protected $with = ['subcategories'];

    protected $appends = ['path'];

    protected $guarded = [];


    public function cacheKey()
    {
        return sprintf(
            "%s/%s-%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        );
    }

    public function path()
    {
        return '/categories/' . $this->id;
    }

    public function items()
    {
        return $this->hasMany(Item::class)->orderBy('name');
    }

    public function subcategories() {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('name');
    }

    public function parentCategory() {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function getCachedItemsCountAttribute()
    {
        return Cache::remember($this->cacheKey() . ':items_count', 15, function () {
            return $this->items->count();
        });
    }

    public function hasParent()
    {
        return !$this->parent_id == null;
    }
}
