<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Building;
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
        $booking = Booking::where('building_id', $buildingId)->where('status', 'confirmed')->get();
        return response()->json($booking);
    }
}
