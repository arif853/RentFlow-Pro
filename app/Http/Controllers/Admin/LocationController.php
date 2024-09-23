<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::paginate(10);
        return view('admin.location.area-location', compact('locations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'google_map_link' => 'nullable|string',
            'picture' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data['location_code'] = strtoupper(substr($data['name'], 0, 2)) . '-' . rand(1000, 9999);

        // if ($request->hasFile('picture')) {
        //     $data['picture'] = $request->file('picture')->store('public/locations');
        // }
        if ($request->hasFile('picture')) {
            // Get the file
            $file = $request->file('picture');

            // Generate a unique file name
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/locations', $fileName);

            // Extract the file name and path separately
            $data['picture'] = $fileName;
        }

        Location::create($data);

        return redirect()->route('locations.index')->with('success', 'Location added successfully');
    }

    public function edit(Location $location)
    {
        $locations = Location::paginate(10);
        return view('admin.location.area-location', compact('location','locations'));
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'google_map_link' => 'nullable|string',
            'picture' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        // $data['location_code'] = strtoupper(substr($data['name'], 0, 2)) . '-' . rand(1000, 9999);

        if ($request->hasFile('picture')) {
            // Get the file
            $file = $request->file('picture');

            // Generate a unique file name
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/locations', $fileName);
            // Delete the old file if it exists
            if ($location->picture) {
                // Construct the full path to the old file
                $oldFilePath = 'public/locations/' . $location->picture;

                // Delete the old file
                Storage::delete($oldFilePath);
            }

            // Extract the file name and path separately
            $data['picture'] = $fileName;
        }

        $location->update($data);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully');
    }

    public function destroy(Location $location)
    {
        if ($location->picture) {
            // Construct the full path to the old file
            $oldFilePath = 'public/locations/' . $location->picture;

            // Delete the old file
            Storage::delete($oldFilePath);
        }
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully');
    }

}
