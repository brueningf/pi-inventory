<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

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
        return $this->image ? '/storage/images/' . $this->image : '/images/no-image.svg';
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
}
