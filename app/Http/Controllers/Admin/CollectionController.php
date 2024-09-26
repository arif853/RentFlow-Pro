<?php

namespace App\Http\Controllers\Admin;

use Mpdf\Mpdf;
use App\Models\Asset;
use App\Models\Building;
use App\Models\Employee;
use App\Models\Collection;
use Illuminate\Http\Request;

use function Illuminate\Log\log;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $collections = Collection::all();
        return view('admin.collection.collection-list',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::where('status', 1)->get();
        $assets = Asset::paginate(10);
        return view('admin.collection.collection',compact('buildings','assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'building_id' => 'required',
            'asset_id' => 'required',
            'employee_id' => 'required',
            'collection_date' => 'required|date',
            'collection_type' => 'required|string',
            'month' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'duration' => 'nullable|integer',
            'payable_amount' => 'required|numeric',
            'collection_amount' => 'required|numeric',
        ]);

        // dd($request->all());
        Collection::create($validatedData);


        return redirect()->back()->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collection = Collection::findOrFail($id);
        return view('admin.collection.collection-details',compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collection = Collection::findOrFail($id);
        // dd($collection);
        return view('admin.collection.collection-edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'collection_date' => 'required|date',
            'collection_type' => 'required|string',
            'month' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'duration' => 'nullable|integer',
            'collection_amount' => 'required|numeric',

        ]);

        $collection = Collection::findOrFail($id);
        $collection->collection_date = $request->input('collection_date');
        $collection->collection_type = $request->input('collection_type');
        $collection->month = $request->input('month');
        $collection->from_date = $request->input('from_date');
        $collection->to_date = $request->input('to_date');
        $collection->duration = $request->input('duration');
        $collection->collection_amount = $request->input('collection_amount');
        $collection->save();

        return redirect()->route('collection.index')->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id); // Find the record by ID
        $collection->delete();
        return redirect()->back()->with('success', 'Collection deleted successfully');
    }

    public function getAssets($buildingId)
    {

        $assets = Asset::where('building_id',$buildingId)->get();
        return response()->json($assets);
    }

    public function getAssetdetails($assetId)
    {

        $assets = Asset::find($assetId);
        return response()->json($assets);
    }

    public function getEmployeedetails($employeeId)
    {

        $employee_details = Employee::find($employeeId);
        return response()->json($employee_details);
    }





    public function print($id)
    {

        $collection = Collection::findOrFail($id);


        $mpdf = new Mpdf([
            'format' => 'A4',
            'default_font_size' => 10,
        ]);

        $html = '
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Collection</title>
                        <style>
                            body {
                                padding: 20px;
                                font-family: Arial, sans-serif;
                            }
                            h1 {
                                font-size: 24px;
                                font-weight: bold;
                            }
                            h2 {
                                margin: 0;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }
                            td {
                                padding: 10px;
                                text-align: left;
                            }
                            tr:nth-child(odd) {
                                background-color: #f9f9f9;
                            }
                            tr:nth-child(even) {
                                background-color: #ffffff;
                            }
                            .breadcrumb {
                                list-style: none;
                                padding: 0;
                                margin: 0;
                            }
                            .breadcrumb li {
                                display: inline;
                                margin-right: 5px;
                            }
                        </style>
                    </head>
                    <body>

                        <main>
                            <div style="margin-bottom: 20px;">
                                <h1>Collection</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li>
                                            <a href="javascript:;" style="text-decoration: none; color: #007bff;">
                                                <i class="bx bx-home-alt"></i>
                                            </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                            <div style="max-width: 600px; margin: 0 auto;">
                                <div style="overflow: hidden;">
                                    <h2>Collection Details</h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Complex</td>
                                                <td>' . ($collection->building ? $collection->building->building_name . ", " . $collection->building->building_code : 'N/A') . '</td>
                                            </tr>
                                            <tr>
                                                <td>Unit Name</td>
                                                <td>' . $collection->asset->unit_name . '</td>
                                            </tr>
                                            <tr>
                                                <td>Employee Name</td>
                                                <td>' . $collection->employee->name . '</td>
                                            </tr>
                                            <tr>
                                                <td>Collection Date</td>
                                                <td>' . $collection->collection_date . '</td>
                                            </tr>
                                            <tr>
                                                <td>Collection Type</td>
                                                <td>' . ($collection->collection_type == '1' ? 'Day Wise' : 'Month Wise') . '</td>
                                            </tr>
                                            <tr>
                                                <td>Duration</td>
                                                <td>' . ($collection->collection_type == '1' ? $collection->duration . ' days, (' . $collection->from_date . ' - ' . $collection->to_date . ')' : $collection->month) . '</td>
                                            </tr>
                                            <tr>
                                                <td>Monthly Rent</td>
                                                <td>' . $collection->asset->monthly_rent . '</td>
                                            </tr>
                                            <tr>
                                                <td>Service Charge</td>
                                                <td>' . $collection->asset->service_charge . '</td>
                                            </tr>
                                            <tr>
                                                <td>Other Charge</td>
                                                <td>' . $collection->asset->others_charge . '</td>
                                            </tr>
                                            <tr>
                                                <td>Total Payable Rent</td>
                                                <td>' . $collection->payable_amount . '</td>
                                            </tr>
                                            <tr>
                                                <td>Collection Amount</td>
                                                <td>' . $collection->collection_amount . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </main>

                    </body>
                </html>
        ';

        $mpdf->WriteHTML($html);

        $mpdf->Output('collection_' . $id . '.pdf', 'D');
    }


}
