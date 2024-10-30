<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::first();
        return view('admin.websetting.websetting',compact('company'));
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

public function update(Request $request, $id)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'address' => 'required|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $company = Company::findOrFail($id);

    // Update the company details
    $company->company_name = $request->company_name;
    $company->phone_number = $request->phone_number;
    $company->email = $request->email;
    $company->address = $request->address;

    // Handle logo upload
    if ($request->hasFile('logo')) {
        // Delete old logo if it exists
        if ($company->logo && Storage::exists('public/' . $company->logo)) {
            Storage::delete('public/' . $company->logo);
        }

        // Create a unique filename
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $uniqueFilename = 'logo' . '_' . time() . '.' . $extension;

        // Store logo in 'public/logos' directory
        $path = $file->storeAs('public/logos', $uniqueFilename);
        $company->logo = 'logos/' . $uniqueFilename; // Save the relative path
    }

    $company->save();

    return redirect()->route('websetting.index')->with('success', 'Company settings updated successfully.');
}




        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
