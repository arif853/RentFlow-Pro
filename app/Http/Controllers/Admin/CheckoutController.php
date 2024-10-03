<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::all();
        return view('admin.checkout.checkout-list',compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::where('status', 1)->get();
        $assets = Asset::all();
        return view('admin.checkout.checkout',compact('buildings','assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'building_id' => 'required|numeric',
            'asset_id' => 'required|numeric',
            'customer_id'=> 'required|numeric',
            'employee_id' => 'required|numeric',
            'month' => 'nullable|string',
            'availability_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // dd($validatedData);

        Checkout::create($validatedData);


        return redirect()->back()->with('success','Created Successfully');
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
        // $assets = Asset::where('building_id',$buildingId)->get();
        $assets = Asset::where('building_id', $buildingId)
        ->whereHas('bookings', function ($query) { $query->where('status', 'confirmed');})->get();
        return response()->json($assets);
    }

    public function getAssetdetails($assetId)
    {
        $assets = Asset::with(['bookings','bookings.customer','bookings.customer.customerInfo','bookings.customer.collection'])->find($assetId);
        // dd($assets);
        return response()->json($assets);
    }
}
