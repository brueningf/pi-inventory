<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $guarded = [];

    protected $with = ['category', 'storageLocations', 'itemCase'];

    public function getPriceAttribute($value)
    {
        return number_format((float)$value, 2, '.', '');;
    }

    public function path()
    {
        return '/items/' . $this->id;
    }

    /**
     * @return string
     */
    public function imagePath()
    {
        return $this->image ? asset($this->image) : '/images/default-image.png';
    }

    public function datasheetPath()
    {
        return "/datasheet?file=$this->datasheet";
    }

    public function status()
    {
        return $this->storageLocations()->firstOr(['status'], function () {
            return '-';
        })->status;
    }

    public function total()
    {
        return $this->storageLocations()->pluck('stock')->sum();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storageLocations()
    {
        return $this->hasMany(StorageLocation::class);
    }

    public function itemCase()
    {
        return $this->belongsTo(ItemCase::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function attributes()
    {
        return $this->hasMany(ItemAttribute::class);
    }
}
