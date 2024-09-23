<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use App\Models\Designation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('admin.employee.manage-employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::where('status',1)->get();
        return view('admin.employee.add-employee',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'employee_code' => 'required|string|max:20|unique:employees,employee_code',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'nid_number' => 'nullable|string|max:20|unique:employees,nid_number',
            'nid_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nid_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'other_documents_type' => 'nullable|string',
            'documents_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation_id' => 'required|string',
            'date_of_joining' => 'nullable',
            'passport_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:1,0',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Prepare data for saving
        $data = $request->only([
            'employee_code', 'name', 'email', 'phone', 'alternative_phone',
            'present_address', 'permanent_address', 'nid_number',
            'other_documents_type', 'designation_id', 'date_of_joining', 'status'
        ]);

        if ($request->hasFile('nid_front')) {
            // Get the file
            $file = $request->file('nid_front');

            // Generate a unique file name
            $fileName = 'nid_front_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/nids', $fileName);

            // Extract the file name and path separately
            $data['nid_front'] = $fileName;
        }

        if ($request->hasFile('nid_back')) {
            // Get the file
            $file = $request->file('nid_back');

            // Generate a unique file name
            $fileName = 'nid_back_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/nids', $fileName);

            // Extract the file name and path separately
            $data['nid_back'] = $fileName;
        }

        if ($request->hasFile('documents_photo')) {
            // Get the file
            $file = $request->file('documents_photo');

            // Generate a unique file name
            $fileName = 'documents_photo_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/documents', $fileName);

            // Extract the file name and path separately
            $data['documents_photo'] = $fileName;
        }

        if ($request->hasFile('passport_photo')) {
            // Get the file
            $file = $request->file('passport_photo');

            // Generate a unique file name
            $fileName = 'passport_photo_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/image', $fileName);

            // Extract the file name and path separately
            $data['passport_photo'] = $fileName;
        }

        if ($request->hasFile('signature')) {
            // Get the file
            $file = $request->file('signature');

            // Generate a unique file name
            $fileName = 'signature_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/image', $fileName);

            // Extract the file name and path separately
            $data['signature'] = $fileName;
        }
        // dd($data);
        try {
            // Save the employee data
        Employee::create($data);
        // $username = $data['name'].'@rental.com';
        // User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'] ?? $username,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make($data['employee_code']),
        //     'remember_token' => Str::random(10),
        // ]);

        // Redirect with success message
        return redirect()->route('employee.index')->with('success', 'Employee added successfully.');

        } catch (\Exception $e) {
            // Handle errors, such as database connection issues or other exceptions
            Log::info($e);
            return redirect()->back()
                            ->with('danger', 'An error occurred while adding the employee. Please try again.')
                            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.employee-profile',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $designations = Designation::where('status',1)->get();
        return view('admin.employee.edit-employee',compact('employee','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'employee_code' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'nid_number' => 'nullable|string|max:20',
            'nid_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nid_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'other_documents_type' => 'nullable|string',
            'documents_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation_id' => 'required|string',
            'date_of_joining' => 'nullable',
            'passport_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:1,0',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Prepare data for saving
        $data = $request->only([
            'employee_code', 'name', 'email', 'phone', 'alternative_phone',
            'present_address', 'permanent_address', 'nid_number',
            'other_documents_type', 'designation_id', 'date_of_joining', 'status'
        ]);

        $employee = Employee::findOrFail($id);
        $user = User::where('email',$employee->email)->first();

        if ($request->hasFile('nid_front')) {
            // Get the file
            $file = $request->file('nid_front');
            // Generate a unique file name
            $fileName = 'nid_front_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/nids', $fileName);

            // Delete the old file if it exists
            if ($employee->nid_front) {
                // Construct the full path to the old file
                $oldFilePath = 'public/employee/nids/' . $employee->nid_front;
                // Delete the old file
                Storage::delete($oldFilePath);
            }
            // Extract the file name and path separately
            $data['nid_front'] = $fileName;
        }

        if ($request->hasFile('nid_back')) {
            // Get the file
            $file = $request->file('nid_back');

            // Generate a unique file name
            $fileName = 'nid_back_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/nids', $fileName);
            // Delete the old file if it exists
            if ($employee->nid_back) {
                // Construct the full path to the old file
                $oldFilePath = 'public/employee/nids/' . $employee->nid_back;
                // Delete the old file
                Storage::delete($oldFilePath);
            }
            // Extract the file name and path separately
            $data['nid_back'] = $fileName;
        }

        if ($request->hasFile('documents_photo')) {
            // Get the file
            $file = $request->file('documents_photo');

            // Generate a unique file name
            $fileName = 'documents_photo_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/documents', $fileName);
            // Delete the old file if it exists
            if ($employee->documents_photo) {
                // Construct the full path to the old file
                $oldFilePath = 'public/employee/documents/' . $employee->documents_photo;
                // Delete the old file
                Storage::delete($oldFilePath);
            }
            // Extract the file name and path separately
            $data['documents_photo'] = $fileName;
        }

        if ($request->hasFile('passport_photo')) {
            // Get the file
            $file = $request->file('passport_photo');

            // Generate a unique file name
            $fileName = 'passport_photo_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/image', $fileName);
            // Delete the old file if it exists
            if ($employee->passport_photo) {
                // Construct the full path to the old file
                $oldFilePath = 'public/employee/image/' . $employee->passport_photo;
                // Delete the old file
                Storage::delete($oldFilePath);
            }
            // Extract the file name and path separately
            $data['passport_photo'] = $fileName;
        }

        if ($request->hasFile('signature')) {
            // Get the file
            $file = $request->file('signature');

            // Generate a unique file name
            $fileName = 'signature_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/employee/image', $fileName);
            // Delete the old file if it exists
            if ($employee->signature) {
                // Construct the full path to the old file
                $oldFilePath = 'public/employee/image/' . $employee->signature;
                // Delete the old file
                Storage::delete($oldFilePath);
            }
            // Extract the file name and path separately
            $data['signature'] = $fileName;
        }
        // dd($data);
        try {
            // Save the employee data
        $employee->update($data);

        if($user){
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        // Redirect with success message
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');

        } catch (\Exception $e) {
            // Handle errors, such as database connection issues or other exceptions
            Log::info($e);
            return redirect()->back()
                            ->with('danger', 'An error occurred while updating the employee. Please try again.')
                            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->nid_front) {
            // Construct the full path to the old file
            $oldFilePath = 'public/employee/nids/' . $employee->nid_front;
            // Delete the old file
            Storage::delete($oldFilePath);
        }
        if ($employee->nid_back) {
            // Construct the full path to the old file
            $oldFilePath = 'public/employee/nids/' . $employee->nid_back;
            // Delete the old file
            Storage::delete($oldFilePath);
        }
        if ($employee->documents_photo) {
            // Construct the full path to the old file
            $oldFilePath = 'public/employee/documents/' . $employee->documents_photo;
            // Delete the old file
            Storage::delete($oldFilePath);
        }
        if ($employee->passport_photo) {
            // Construct the full path to the old file
            $oldFilePath = 'public/employee/image/' . $employee->passport_photo;
            // Delete the old file
            Storage::delete($oldFilePath);
        }
        if ($employee->signature) {
            // Construct the full path to the old file
            $oldFilePath = 'public/employee/image/' . $employee->signature;
            // Delete the old file
            Storage::delete($oldFilePath);
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee data deleted successfully');
    }
}
