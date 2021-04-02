<?php

use App\Item;
use App\ItemAttribute;
use App\StorageLocation;

Route::get('/search/{query}', function ($query) {
    return Item::where('name', 'LIKE', "%{$query}%")->limit(5)->get();
});

Route::get('/storage-locations-data', function () {
    $lists = [];

    $lists[] = StorageLocation::select('location')->where('location', '!=', 'Not specified')->distinct()->get();
    $lists[] = StorageLocation::select('level')->whereNotNull('level')->distinct()->get();

    return $lists;
});

Route::resource('/storage-locations', 'StorageLocationController');
Route::delete('/attributes/{attribute}', function (ItemAttribute $attribute) {
    $attribute->delete();

    return response('Ok, attribute deleted');
});

Route::post('/add-attribute/{item}', function (Item $item) {
    $attribute = $item->attributes()->save(new ItemAttribute(['name' => request('name'), 'value' => \request('value')]));

    return response($attribute);
});


Route::post('/add-project/{item}', function (Item $item) {
    $item->projects()->attach(request()->project);

    return response('Associated', 201);
});

Route::post('/delete-project/{item}', function (Item $item) {
    $item->projects()->detach(request()->project);

    return response('Ok, disassociated');
});
