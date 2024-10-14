<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Asset;
use App\Models\Floor;
use App\Models\Booking;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function generatebookingPdf($buildingId)
    {
        // Fetch the booking data based on the building ID
        $bookings = Booking::with(['building', 'floor', 'asset', 'customer'])
            ->where('building_id', $buildingId)
            ->where('status', 'confirmed')
            ->get();

        // Load the view for PDF
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $pdf->setOptions($options);

        // Pass data to the view
        $html = view('admin.report.booking-pdf-report', compact('bookings'))->render();

        $pdf->loadHtml($html);
        $pdf->setPaper('A4');
        $pdf->render();

        // Output the generated PDF
        return $pdf->stream('booking_report.pdf');
    }

    public function generateAssetPdf($locationId, $buildingId, $floorId)
    {
        // Start the query on the Asset model
        $query = Asset::with(['building', 'floor', 'location']);

        // Apply filters only if they are provided (i.e., not 0)
        if ($locationId != 0) {
            $query->where('location_id', $locationId);
        }

        if ($buildingId != 0) {
            $query->where('building_id', $buildingId);
        }

        if ($floorId != 0) {
            $query->where('floor_id', $floorId);
        }

        // Execute the query and get the results
        $assets = $query->get();

        // Load the view for PDF
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $pdf->setOptions($options);

        // Pass data to the view
        $html = view('admin.report.asset-pdf-report', compact('assets'))->render();

        $pdf->loadHtml($html);
        $pdf->setPaper('A4');
        $pdf->render();

        // Output the generated PDF
        return $pdf->stream('asset_report.pdf');
    }


}
