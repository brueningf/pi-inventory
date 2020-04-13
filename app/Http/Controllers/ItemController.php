<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\ItemCase;
use App\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $availableCategories = Category::all();
        $itemCases = ItemCase::all();

        return view('items.create', compact('manufacturers', 'availableCategories', 'itemCases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate(['category_id' => 'required', 'item_case_id' => 'required']);

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->provider_code = $request->provider_code;
        $item->category_id = $request->category_id;
        $item->manufacturer_id = $request->manufacturer_id;
        $item->item_case_id = $request->item_case_id;

        $item->save();

        return redirect('/items/' . $item->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Item $item
     * @return Response
     */
    public function show(Item $item)
    {
        $item->load('manufacturer');

        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Item $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Item $item)
    {
        $manufacturers = Manufacturer::all();
        $availableCategories = Category::all();
        $itemCases = ItemCase::all();

        return view('items.edit', compact('item', 'manufacturers', 'availableCategories', 'itemCases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        $item->save();

        return redirect($item->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Item $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/');
    }
}
