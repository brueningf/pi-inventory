<?php

Route::get('/', 'MainController@index');
Route::post('/search', 'SearchController@search');

Route::resource('/items', 'ItemController');
Route::resource('/categories', 'CategoryController');
Route::resource('/providers', 'ProviderController');
