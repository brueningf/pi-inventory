<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemCase;
use Illuminate\Http\Request;

class ItemCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemCases = ItemCase::orderBy('name')->get();
        return view('item-cases.index', compact('itemCases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item-cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        ItemCase::create($request->only(['name','image']));

        return redirect(route('item-cases.index'))->with('success', 'Item case was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemCase  $itemCase
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ItemCase $itemCase)
    {
        $itemCase->load('items');

        return view('item-cases.show', compact('itemCase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemCase  $itemCase
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ItemCase $itemCase)
    {
        return view('item-cases.edit', compact('itemCase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCase  $itemCase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ItemCase $itemCase)
    {
        $itemCase->update($request->only(['name', 'image']));
        $itemCase->save();

        return redirect('/item-cases')->with('success', 'Item case was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCase  $itemCase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ItemCase $itemCase)
    {
        $itemCase->delete();

        return redirect()->back()->with('success', 'Item case was deleted.');
    }
}
