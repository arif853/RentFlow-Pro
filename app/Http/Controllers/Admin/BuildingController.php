<?php

namespace App\Http\Controllers\Admin;

use App\Models\Building;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Building::class, 'building');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::paginate(10);
        return view('admin.building.manage-building',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::where('status',1)->get();
        $employees = Employee::where('status',1)->get();
        return view('admin.building.add-building',compact('locations','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'building_name' => 'required|string|max:255',
            'building_type' => 'nullable|in:commercial,residential,teen-sheed,semi-paka,others',
            'total_floor' => 'nullable|integer|min:1',
            'address' => 'nullable|string|max:255',
            'building_code' => 'nullable|string|max:50',
            'location_id' => 'nullable|exists:locations,id', // Assumes that `locations` table has a primary key `id`
            'employee_id' => 'nullable|exists:employees,id', // Assumes that `employees` table has a primary key `id`
            'security_guard_name' => 'nullable|string|max:255',
            'guard_contact_number' => 'nullable|string|max:20',
            'gate_open_time' => 'nullable|date_format:H:i',
            'gate_close_time' => 'nullable|date_format:H:i|after:gate_open_time',
            'status' => 'required|in:1,2',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Prepare data for saving
        $data = $request->only([
            'building_name',
            'building_type',
            'total_floor',
            'address',
            'building_code',
            'location_id',
            'employee_id',
            'security_guard_name',
            'guard_contact_number',
            'gate_open_time',
            'gate_close_time',
            'status',
        ]);

        try {
            // Create a new building record
            Building::create($data);
            // Redirect with success message

            return redirect()->route('building.index')->with('success', 'Building created successfully!');
        } catch (\Exception $e) {
            // Handle errors, such as database connection issues or other exceptions
            Log::info($e);
            return redirect()->back()
                            ->with('danger', 'An error occurred while creating the building. Please try again.')
                            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return view('admin.building.building-details',compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        $locations = Location::where('status',1)->get();
        $employees = Employee::where('status',1)->get();
        return view('admin.building.edit-building',compact('building','locations','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'building_name' => 'required|string|max:255',
            'building_type' => 'nullable|in:commercial,residential,teen-sheed,semi-paka,others',
            'total_floor' => 'nullable|integer|min:1',
            'address' => 'nullable|string|max:255',
            'building_code' => 'nullable|string|max:50',
            'location_id' => 'nullable|exists:locations,id', // Assumes that `locations` table has a primary key `id`
            'employee_id' => 'nullable', // Assumes that `employees` table has a primary key `id`
            'security_guard_name' => 'nullable|string|max:255',
            'guard_contact_number' => 'nullable|string|max:20',
            'gate_open_time' => 'nullable',
            'gate_close_time' => 'nullable|after:gate_open_time',
            'status' => 'required|in:1,2',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Prepare data for saving
        $data = $request->only([
            'building_name',
            'building_type',
            'total_floor',
            'address',
            'building_code',
            'location_id',
            'employee_id',
            'security_guard_name',
            'guard_contact_number',
            'gate_open_time',
            'gate_close_time',
            'status',
        ]);

        try {
            // Create a new building record
            $building = Building::findOrFail($id);
            $building->update($data);

            // Redirect with success message
            return redirect()->route('building.index')->with('success', 'Building updated successfully!');
        } catch (\Exception $e) {
            // Handle errors, such as database connection issues or other exceptions
            Log::info($e);
            return redirect()->back()
                            ->with('danger', 'An error occurred while updating the building. Please try again.')
                            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        try{
            $building->delete();
            return redirect()->route('building.index')->with('success', 'Building deleted successfully');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            return redirect()->back()->with('danger','Building can not be delete, Building asset exist.');
        }
    }

    public function locationList(string $id)
    {
        $location = Location::find($id);
        return response()->json($location);
    }

    public function getEmployeeDetails($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return response()->json([
                'name' => $employee->name,
                'designation' => $employee->designation->designation_name, // Assuming you have a relationship with designation
                'phone' => $employee->phone,
                'employee_code' => $employee->employee_code,
                'date_of_joining' => $employee->date_of_joining, // Formatting date
                'photo' => asset('storage/employee/image/' . $employee->passport_photo), // Path to photo
                'signature' => asset('storage/employee/image/' . $employee->signature), // Path to signature
                'nid_number' => $employee->nid_number,
                'present_address' => $employee->present_address,
            ]);
        }

        return response()->json(null, 404);
    }
}
