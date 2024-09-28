<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employee::class, 'employee');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::paginate(10);
        return view('admin.employee.designation',compact('designations'));
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
        $request->validate([
            'designation_name' => 'required|string|max:255',
            'designation_short_name' => 'nullable|string|max:255',
            'designation_code' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Designation::create($request->all());

        return redirect()->route('designation.index')->with('success', 'Designation added successfully.');
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
    public function edit(Designation $designation)
    {
        $designations = Designation::paginate(10);
        return view('admin.employee.designation',compact('designation','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'designation_name' => 'required|string|max:255',
            'designation_short_name' => 'nullable|string|max:255',
            'designation_code' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $designation->update($request->all());

        return redirect()->route('designation.index')->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designation.index')->with('success', 'Designation deleted successfully.');
    }
}
