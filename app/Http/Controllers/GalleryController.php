<?php

namespace App\Http\Controllers;


class GalleryController extends Controller
{

    public function show()
    {
        $items = \App\Item::whereNotNull('image')->get();

        return view('gallery', compact('items'));
    }
}
