<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoomtypeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(RoomType::class, 'roomtype');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = RoomType::paginate(10);
        return view('admin.room.room-type',compact('items'));
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
        $rules = [
            'roomType' => 'required|string'
        ];

        $validator = Validator::make($request->all(),$rules);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{

            RoomType::create([
                'roomType' => $request->roomType,
                'status' => $request->status
            ]);

            Session::flash('success', 'Room Type added successfully.');

            return redirect()->route('roomtype.index');
        }
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
    public function edit($id)
    {
        $editData = RoomType::findOrFail($id);
        $items = RoomType::paginate(10); // Or use pagination
        return view('admin.room.room-type', compact('editData', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'roomType' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $roomType = RoomType::findOrFail($id);
        $roomType->update($validatedData);

        return redirect()->route('roomtype.index')->with('success', 'Room type updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomtype = RoomType::find($id);
        $roomtype->delete();
        // if (request()->ajax()) {
        //     return response()->json(['success' => 'Slider deleted successfully.']);
        // }
        Session::flash('success','Room type deleted successfully.');

        return redirect()->back();
    }
}
