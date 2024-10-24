<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Asset;
use App\Models\Floor;
use App\Models\Building;
use App\Models\Location;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
    public function monthWiseReport()
    {
        $buildings = Building::all();
        return view('admin.collectionreport.monthwise-total-report',compact('buildings'));
    }

    public function monthWiseDetails(Request $request)
    {
        $selectedMonth = $request->input('selected_month');
        $selectedBuilding = $request->input('selected_building');
        $query = Collection::query();

        if ($selectedMonth) {
            $query->where('month', $selectedMonth);
        }
        if ($selectedBuilding) {
            $query->where('building_id',$selectedBuilding);
        }

        $collections = $query->with(['customer','asset','building'])->get();

        return response()->json($collections);

    }

    public function generateMonthWiseCollectionPdf($collectionMonth)
    {
        // Replace the '-' back with '/' if necessary
        $collectionMonth = str_replace('-', '/', $collectionMonth);

        // Start the query on the Collection model
        $query = Collection::query();

        // Apply filters based on the month
        if ($collectionMonth) {
            $query->where('month', $collectionMonth);
        }

        // Fetch collections with related models
        $collections = $query->with(['customer', 'asset', 'building'])->get();

        // Load the view for PDF
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $pdf->setOptions($options);

        // Format the month using Carbon
        $formattedMonth = Carbon::createFromFormat('m/Y', $collectionMonth)->format('F Y');

        // Pass data to the view, including the formatted month
        $html = view('admin.collectionreport.monthwise-total-pdf-report', compact('collections', 'formattedMonth'))->render();

        // Load the HTML into Dompdf and generate the PDF
        $pdf->loadHtml($html);
        $pdf->setPaper('A4');
        $pdf->render();

        // Output the generated PDF
        return $pdf->stream('monthwise_total_report.pdf');
    }





    public function yearhWiseReport()
    {
        return view('admin.collectionreport.yearwise-total-report');
    }

    public function yearhWiseDetails(Request $request)
    {
        $selectedYear = $request->input('selected_year');
        $query = Collection::query();


        $collections = Collection::select('asset_id')
        ->selectRaw('SUM(payable_amount) as total_payable_amount')
        ->selectRaw('SUM(collection_amount) as total_collection_amount')
        ->selectRaw('SUM(due_amount) as total_due_amount')
        ->where('month', 'like', '%/' . $selectedYear)
        ->groupBy('asset_id')
        ->get();

        // Load asset relationships for the retrieved collections
        $collections->load('asset');

        return response()->json($collections);

    }

    // public function generateYearWiseCollectionPdf($collectionMonth)
    // {
    //     // Replace the '-' back with '/' if necessary
    //     $collectionMonth = str_replace('-', '/', $collectionMonth);

    //     // Start the query on the Collection model
    //     $query = Collection::query();

    //     // Apply filters based on the month
    //     if ($collectionMonth) {
    //         $query->where('month', $collectionMonth);
    //     }

    //     // Fetch collections with related models
    //     $collections = $query->with(['customer', 'asset', 'building'])->get();

    //     // Load the view for PDF
    //     $pdf = new Dompdf();
    //     $options = new Options();
    //     $options->set('defaultFont', 'Arial');
    //     $pdf->setOptions($options);

    //     // Format the month using Carbon
    //     $formattedMonth = Carbon::createFromFormat('m/Y', $collectionMonth)->format('F Y');

    //     // Pass data to the view, including the formatted month
    //     $html = view('admin.collectionreport.monthwise-total-pdf-report', compact('collections', 'formattedMonth'))->render();

    //     // Load the HTML into Dompdf and generate the PDF
    //     $pdf->loadHtml($html);
    //     $pdf->setPaper('A4');
    //     $pdf->render();

    //     // Output the generated PDF
    //     return $pdf->stream('yearwise_total_report.pdf');
    // }

}
