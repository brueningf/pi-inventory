<?php

use App\Category;
use App\Item;
use App\Provider;
use Illuminate\Http\Request;

Route::get('/', function () {
    $providers = Provider::all();
    $categories = Category::all();
    $items = Item::orderBy('id', 'desc')->take(5)->get();

    return view('index', compact('categories', 'providers', 'items'));
});

Route::post('/search', function (Request $request) {
    $query = $request->q;
    $items = Item::orWhere('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('provider_code', 'like', '%' . $query . '%')->get();

    return view('search', compact('items', 'query'));
});

Route::resource('/items', 'ItemController');
Route::resource('/categories', 'CategoryController');
Route::resource('/providers', 'ProviderController');
