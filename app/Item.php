<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $guarded = [];

    protected $with = ['category', 'storageLocations', 'itemCase'];

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
