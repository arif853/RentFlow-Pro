<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Booking;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Floor;
use App\Models\Location;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function bookingReport()
    {
        $buildings = Building::all();
        return view('admin.report.booking-report',compact('buildings'));
    }
    public function bookingDetails($buildingId)
    {
        $booking = Booking::where('building_id', $buildingId)->where('status', 'confirmed')->with(['building','customer','floor','asset'])->get();
        return response()->json($booking);
    }
    public function checkoutReport()
    {
        $buildings = Building::all();
        return view('admin.report.checkout-report',compact('buildings'));
    }
    public function checkoutDetails($buildingId)
    {
        $chekout = Checkout::where('building_id', $buildingId)->where('is_confirm', 1)->with(['building','asset','customer'])->get();
        return response()->json($chekout);
    }
    public function assetReport()
    {
        $buildings = Building::all();
        $locations = Location::all();
        $floors = Floor::all();
        return view('admin.report.asset-report',compact('buildings','locations','floors'));
    }
    public function assetDetails(Request $request)
    {
        // Retrieve the input data from the request
        $locationId = $request->input('location_id');
        $buildingId = $request->input('building_id');
        $floorId = $request->input('floor_id');

        // Start the query on the Asset model
        $query = Asset::query();

        // Apply filters based on the request data
        if ($locationId) {
            $query->where('location_id', $locationId);
        }

        if ($buildingId) {
            $query->where('building_id', $buildingId);
        }

        if ($floorId) {
            $query->where('floor_id', $floorId);
        }

        // Execute the query and get the results
        $assets = $query->with(['building','floor','location'])->get();

        // Return the filtered assets as a JSON response
        return response()->json($assets);
    }

}
