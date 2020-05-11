<?php

Route::get('/', 'MainController@index');
Route::post('/search', 'SearchController@search');

Route::resource('/items', 'ItemController');
Route::resource('/item-cases', 'ItemCaseController');
Route::resource('/manufacturers', 'ManufacturerController');

Route::resource('/categories', 'CategoryController');
Route::resource('/providers', 'ProviderController');

Route::get('/datasheet', function () {
    return response() ->file(request('file'));
});
