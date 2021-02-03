<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availableCategories = Category::with('parentCategory')->orderBy('name')->get();

        return view('categories.index', compact('availableCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $availableCategories = Category::orderBy('name')->get();

        return view('categories.create', compact('availableCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'description' => 'nullable']);

        $category = new Category();
        $category->fill($request->only(['name', 'description', 'image']));
        $category->save();

        return redirect('/categories')->with('success', 'The ' . $category->name . ' category was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        $category->with('items');

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $availableCategories = Category::where('id', '!=', $category->id)->orderBy('name')->get();

        return view('categories.edit', compact('category', 'availableCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->only(['name', 'description', 'parent_id', 'image']));
        $category->save();

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category->items()->count()) {
            return redirect()->back()->with('error', 'Category cannot be deleted, move the items to another category or delete them first.');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted');
    }
}
