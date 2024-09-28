<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Asset;
use App\Models\Floor;
use App\Models\Building;
use App\Models\Employee;
use App\Models\Location;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Asset::class, 'asset');
    }

    public function index()
    {
        $assets = Asset::paginate(10);
        return view('admin.asset.manage-asset',compact('assets'));
    }

    public function create()
    {
        $buildings = Building::where('status',1)->get();
        $locations = Location::where('status',1)->get();
        $employees = Employee::where('status',1)->get();
        $floors = Floor::where('status', 1)->get();
        return view('admin.asset.add-asset',compact('buildings','locations','employees','floors'));
    }

    public function store(Request $request)
    {
        // Validation Rules
        $validated = $request->validate([
            'unit_name' => 'required|string|max:255',
            'asset_code' => 'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
            'location_id' => 'required|exists:locations,id',
            'floor_id' => 'required|exists:floors,id',
            'gas_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'gas_owner_part_amount' => 'nullable|numeric|min:0',
            'gas_rental_part_amount' => 'nullable|numeric|min:0',
            'lift_facility' => ['nullable', Rule::in(['Yes', 'No'])],
            'electricity_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'e_owner_part_amount' => 'nullable|numeric|min:0',
            'e_rental_part_amount' => 'nullable|numeric|min:0',
            'water_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'water_owner_part_amount' => 'nullable|numeric|min:0',
            'water_rental_part_amount' => 'nullable|numeric|min:0',
            'unit_size' => 'nullable|string|max:255',
            'unit_view' => 'nullable|string|max:255',
            'monthly_rent' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'others_charge' => 'nullable|numeric|min:0',
            'available_from' => 'nullable|date',
            'others_description' => 'nullable|string',
            'employee_id' => 'nullable|exists:employees,id',
            'status' => 'required|in:1,0',
        ]);

        $validatedData = $request->validate([
            // 'building_id' => 'required|exists:buildings,id',
            'room_type_id.*' => 'nullable|string',
            'room_size.*' => 'nullable|integer',
            'room_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'electricity.*' => 'nullable',
            'aircondition.*' => 'nullable',
            'attach_toilet.*' => 'nullable',
            'attach_baranda.*' => 'nullable',
            'has_window.*' => 'nullable',
            'others.*' => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            // Store the validated data
           $asset = Asset::create($validated);

            if($request->room_type_id){
                foreach ($request->room_type_id as $key => $value) {
                    $room = new Room();
                    $room->building_id = $request->building_id;
                    $room->asset_id = $asset->id;
                    $room->room_type_id = $value;
                    $room->room_size = $request->room_size[$key];
                    $room->electricity = $request->has('electricity.' . $key);
                    $room->aircondition = $request->has('aircondition.' . $key);
                    $room->attach_toilet = $request->has('attach_toilet.' . $key);
                    $room->attach_baranda = $request->has('attach_baranda.' . $key);
                    $room->has_window = $request->has('has_window.' . $key);
                    $room->others = $request->has('others.' . $key);

                    if ($request->hasFile('room_image.' . $key)) {
                        $file = $request->file('room_image.' . $key);
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->storeAs('public/room_images', $filename);
                        $room->room_image = $filename;
                    }

                    $room->save();
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Asset saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back()->with('error', 'An error occurred while saving the Asset.');
        }
    }

    public function show(Asset $asset)
    {
        return view('admin.asset.asset-details',compact('asset'));
    }

    public function edit(Asset $asset)
    {
        $buildings = Building::where('status',1)->get();
        $locations = Location::where('status',1)->get();
        $employees = Employee::where('status',1)->get();
        $floors = Floor::where('status', 1)->get();
        $roomtypes = RoomType::where('status', 1)->get();

        return view('admin.asset.edit-asset',compact('asset','buildings','locations','employees','floors','roomtypes'));
    }

    public function update(Request $request, Asset $asset)
    {
        // Validation Rules
        $validated = $request->validate([
            'unit_name' => 'required|string|max:255',
            'asset_code' => 'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
            'location_id' => 'required|exists:locations,id',
            'floor_id' => 'required|exists:floors,id',
            'gas_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'gas_owner_part_amount' => 'nullable|numeric|min:0',
            'gas_rental_part_amount' => 'nullable|numeric|min:0',
            'lift_facility' => ['nullable', Rule::in(['Yes', 'No'])],
            'electricity_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'e_owner_part_amount' => 'nullable|numeric|min:0',
            'e_rental_part_amount' => 'nullable|numeric|min:0',
            'water_type' => ['nullable', Rule::in(['Prepaid', 'Post Paid', 'Partial'])],
            'water_owner_part_amount' => 'nullable|numeric|min:0',
            'water_rental_part_amount' => 'nullable|numeric|min:0',
            'unit_size' => 'nullable|string|max:255',
            'unit_view' => 'nullable|string|max:255',
            'monthly_rent' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'others_charge' => 'nullable|numeric|min:0',
            'available_from' => 'nullable|date',
            'others_description' => 'nullable|string',
            'employee_id' => 'nullable|exists:employees,id',
            'status' => 'required|in:1,0',
        ]);

        $validatedData = $request->validate([
            // 'building_id' => 'required|exists:buildings,id',
            'room_type_id.*' => 'nullable|string',
            'room_size.*' => 'nullable|integer',
            'room_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'electricity.*' => 'nullable',
            'aircondition.*' => 'nullable',
            'attach_toilet.*' => 'nullable',
            'attach_baranda.*' => 'nullable',
            'has_window.*' => 'nullable',
            'others.*' => 'nullable',
        ]);

        try {

            DB::beginTransaction();
            if($request->gas_type != 'Partial')
            {
                $validated['gas_owner_part_amount'] = null;
                $validated['gas_rental_part_amount'] = null;
            }
            if($request->electricity_type != 'Partial')
            {
                $validated['e_owner_part_amount'] = null;
                $validated['e_rental_part_amount'] = null;
            }
            if($request->water_type != 'Partial')
            {
                $validated['water_owner_part_amount'] = null;
                $validated['water_rental_part_amount'] = null;
            }

            $asset->update($validated);
            // Loop through the room types and update or create rooms accordingly
            foreach ($request->room_type_id as $key => $value) {
                // Fetch the old room using the correct room ID from the array
                $oldroom = Room::find($request->room_id[$key] ?? null);

                // Check if the room already exists
                if ($oldroom) {
                    // Handle file upload for existing rooms
                    if ($request->hasFile('room_image.' . $key)) {
                        $file = $request->file('room_image.' . $key);
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->storeAs('public/room_images', $filename);

                        // Delete old image if it exists
                        if ($oldroom->room_image) {
                            $filepath = 'public/room_images/' . $oldroom->room_image;
                            Storage::delete($filepath);
                        }
                    } else {
                        $filename = $oldroom->room_image;
                    }

                    // Update the existing room details
                    $oldroom->update([
                        'building_id' => $request->building_id,
                        'asset_id' => $asset->id,
                        'room_type_id' => $value,
                        'room_size' => $request->room_size[$key],
                        'electricity' => $request->has('electricity.' . $key),
                        'aircondition' => $request->has('aircondition.' . $key),
                        'attach_toilet' => $request->has('attach_toilet.' . $key),
                        'attach_baranda' => $request->has('attach_baranda.' . $key),
                        'has_window' => $request->has('has_window.' . $key),
                        'others' => $request->has('others.' . $key),
                        'room_image' => $filename,
                    ]);
                } else {
                    // Create a new room if it doesn't exist
                    $room = new Room();
                    $room->building_id = $request->building_id;
                    $room->asset_id = $asset->id;
                    $room->room_type_id = $value;
                    $room->room_size = $request->room_size[$key];
                    $room->electricity = $request->has('electricity.' . $key);
                    $room->aircondition = $request->has('aircondition.' . $key);
                    $room->attach_toilet = $request->has('attach_toilet.' . $key);
                    $room->attach_baranda = $request->has('attach_baranda.' . $key);
                    $room->has_window = $request->has('has_window.' . $key);
                    $room->others = $request->has('others.' . $key);

                    // Handle file upload for new rooms
                    if ($request->hasFile('room_image.' . $key)) {
                        $file = $request->file('room_image.' . $key);
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->storeAs('public/room_images', $filename);
                        $room->room_image = $filename;
                    }

                    $room->save();
                }
            }

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Asset updated successfully.');
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error($e); // Log the error
            return redirect()->back()->with('error', 'An error occurred while saving the Asset. ' . $e->getMessage());
        }
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('asset.index')->with('success', 'Asset deleted successfully');

    }

    public function assetRoomDelete(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('succes','Room remove successfully');
    }

    public function getBuildingDetails($id)
    {
        $building = Building::find($id);

        if($building)
        {
            return response()->json($building);
        }
        return response()->json(null, 404);
    }

    public function getRoomType()
    {
        $roomtype = RoomType::all();
        if($roomtype)
        {
            return response()->json($roomtype);

        }

        return response()->json(null,404);
    }
}
