<?php

namespace App\Http\Controllers;

use App\Item;
use App\Manufacturer;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::orderBy('id', 'desc')->take(10)->get();
        $items = Item::orderBy('id', 'desc')->take(5)->get();

        return view('index', compact(['items', 'manufacturers']));
    }
}
