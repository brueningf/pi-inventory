<?php

use Response;

Route::get('/', 'MainController@index');
Route::post('/search', 'SearchController@search');

Route::resource('/items', 'ItemController');
Route::resource('/item-cases', 'ItemCaseController');
Route::resource('/manufacturers', 'ManufacturerController');

Route::resource('/categories', 'CategoryController');
Route::resource('/providers', 'ProviderController');

Route::get('/datasheet', function () {

    $path = request('file');

    if (!file_exists($path)) {
        return redirect()->back()->with('error', 'The file is not available');
    }

    return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
    ]);
});
