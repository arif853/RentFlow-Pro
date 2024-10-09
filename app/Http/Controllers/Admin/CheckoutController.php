<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\CustomerExtra;

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
            'employee_id' => 'nullable|numeric',
            'month' => 'nullable|string',
            'availability_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // dd($validatedData);

        Checkout::create($validatedData);


        return redirect()->route('checkout.index')->with('success', 'Created Successfully');
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
        ->whereHas('bookings', function ($query) { $query->where('status', 'confirmed');})
        ->whereDoesntHave('checkouts')
        ->get();

        return response()->json($assets);
    }

    public function getAssetdetails($assetId)
    {
        $assets = Asset::with(['bookings','bookings.customer','bookings.customer.customerInfo','bookings.customer.collection'])->find($assetId);
        return response()->json($assets);
    }

    public function checkoutApprovalList()
    {
        $checkouts = Checkout::all();
        return view('admin.checkout.checkout-approval-list',compact('checkouts'));
    }
    public function checkoutApproval($checkoutId)
    {
        $checkout = Checkout::findOrFail($checkoutId);
        $checkout->is_confirm =  1;
        $checkout->save();
        // dd($checkout->customer_id);
        $customerId = $checkout->customer_id;
        $booking = Booking::where('customer_id',$customerId)->first();
        $asset = Asset::find($booking->asset_id);
        $asset->available_from = $checkout->availability_date;
        $asset->is_book = 0;
        $asset->save();

        // dd($asset);

        return redirect()->route('checkout.approval.list')->with('success', 'Checkout Successfully');
    }

    public function CustomerDue($customerId)
    {
        $collections = Collection::where('customer_id',$customerId)->get();

        return response()->json($collections);
    }
}
