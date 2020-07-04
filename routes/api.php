<?php

use App\Http\Controllers\StorageLocationController;
use App\Item;
use App\ItemAttribute;
use Illuminate\Http\Request;

Route::resource('/storage-locations', 'StorageLocationController');
Route::delete('/attributes/{attribute}', function (ItemAttribute $attribute) {
    $attribute->delete();

    return response('Ok, attribute deleted');
});

Route::post('/add-attribute/{item}', function (Item $item) {
    $attribute = $item->attributes()->save(new ItemAttribute(['name' => request('name'), 'value' => \request('value')]));

    return response($attribute);
});
