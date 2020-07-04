<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\ItemCase;
use App\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:items',
            'description' => 'nullable',
            'price' => 'required',
            'provider_code' => 'nullable',
            'marking_code' => 'nullable',
            'image' => 'nullable|file',
            'datasheet' => 'nullable',
            'category_id' => 'required',
            'item_case_id' => 'required',
            'manufacturer_id' => 'nullable'
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->storePublicly('items');
        }

        $item = Item::create($attributes);

        return redirect('/items/' . $item->id)->with('success', 'Item was created.');
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
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Item $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function update(Request $request, Item $item)
    {
        $attributes = $request->all();

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }

            $attributes['image'] = request('image')->storePublicly('items');
        }

        $item->update($attributes);

        if ($request->wantsJson()) {
            return response('Ok, updated');
        }

        return redirect()->back()->with('success', 'Item was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Item $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Item $item)
    {
        $category = $item->category->path();
        $item->delete();

        if (request()->wantsJson()) {
            return response('Deleted', Response::HTTP_NO_CONTENT);
        }

        return redirect($category)->with('success', 'Item was deleted.');
    }
}
