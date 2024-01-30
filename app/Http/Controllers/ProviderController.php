<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Manufacturer();
        $provider->name = $request->name;
        $provider->website = $request->website;
        $provider->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $provider)
    {
        return view('categories.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $provider)
    {
        //
    }
}