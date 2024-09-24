<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::where('status', 1)->get();
        $assets = Asset::paginate(10);
        return view('admin.collection.collection',compact('buildings','assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getAssets($buildingId)
    {

        $assets = Asset::where('building_id',$buildingId)->get();
        return response()->json($assets);
    }

    public function getAssetdetails($assetId)
    {

        $assets = Asset::find($assetId);
        return response()->json($assets);
    }
}
