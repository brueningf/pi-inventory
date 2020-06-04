<?php

namespace App\Http\Controllers;

use App\StorageLocation;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = StorageLocation::select('location')->distinct()->orderBy('location')->get();

        return view('storage-locations.index', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StorageLocation::create($request->all());

        return response('Ok', 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StorageLocation $storageLocation)
    {
        $storageLocation->stock = $request->stock;
        $storageLocation->save();

        return response('Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorageLocation $storageLocation)
    {
        $storageLocation->delete();

        return response('Deleted', 200);
    }
}
