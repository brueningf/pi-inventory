<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $with = ['category', 'provider', 'storageLocations'];

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

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function storageLocations()
    {
        return $this->hasMany(StorageLocation::class);
    }
}
