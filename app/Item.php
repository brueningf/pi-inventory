<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $guarded = [];

    protected $with = ['category', 'storageLocations', 'itemCase', 'attributes'];

    protected $appends = ['total_stock', 'status', 'image_path', 'datasheet_path', 'path'];

    public function path()
    {
        return '/items/' . $this->id;
    }

    public function imagePath()
    {
        return $this->image ? asset($this->image) : '/images/default-image.png';
    }

    public function datasheetPath()
    {
        return "/datasheet?file=" . urlencode($this->datasheet);
    }

    public function status()
    {
        return $this->storageLocations->count() ? $this->storageLocations[0]->status :  '-';
    }

    public function total()
    {
        return $this->storageLocations->pluck('stock')->sum();
    }

    public function getPriceAttribute($value)
    {
        return number_format((float) $value, 2, '.', '');
    }

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function getImagePathAttribute()
    {
        return $this->imagePath();
    }

    public function getDatasheetPathAttribute()
    {
        return $this->datasheetPath();
    }

    public function getStatusAttribute()
    {
        return $this->status();
    }

    public function getTotalStockAttribute()
    {
        return $this->total();
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
