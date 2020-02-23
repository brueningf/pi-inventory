<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $query = $request->q;
        $items = Item::orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('provider_code', 'like', '%' . $query . '%')->get();
    
        return view('search', compact('items', 'query'));
    }
}
