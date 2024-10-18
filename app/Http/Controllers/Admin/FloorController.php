<?php

namespace App\Http\Controllers\Admin;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Building;

class FloorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Floor::class, 'floor');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::all();
        $floors = Floor::paginate(10);
        return view('admin.floor.floor', compact('floors','buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'building_id' => 'required|integer',
            'floor_name' => 'required|string|max:255',
            'floor_size' => 'nullable|string|max:255',
            'total_unit' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        Floor::create($request->all());

        return redirect()->route('floors.index')->with('success', 'Floor added successfully.');
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
    public function edit(Floor $floor)
    {
        $buildings = Building::all();
        $floors = Floor::paginate(10);
        return view('admin.floor.floor', compact('floor','floors','buildings'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'building_id' => 'required|integer',
            'floor_name' => 'required|string|max:255',
            'floor_size' => 'nullable|string|max:255',
            'total_unit' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $floor->update($request->all());

        return redirect()->route('floors.index')->with('success', 'Floor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect()->route('floors.index')->with('success', 'Floor deleted successfully.');
    }
}
