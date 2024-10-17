<?php

namespace App\Http\Controllers\Admin;

use Mpdf\Mpdf;
use App\Models\Asset;
use App\Models\DueLog;
use App\Models\Booking;
use App\Models\Building;
use App\Models\Customer;

use App\Models\Employee;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\CustomerExtra;
use function Illuminate\Log\log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Collection::class, 'collection');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::all();
        $buildings = Building::all();
        return view('admin.collection.collection-list',compact('collections','buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::where('status', 1)->get();
        $assets = Asset::all();
        return view('admin.collection.collection',compact('buildings','assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'building_id' => 'required',
            'asset_id' => 'required',
            'customer_id' => 'required',
            'employee_id' => 'nullable|numeric',
            'collection_date' => 'required|date',
            'month' => 'required|string',
            'payable_amount' => 'required|numeric',
            'water_amount' => 'nullable|numeric',
            'gas_amount' => 'nullable|numeric',
            'internet_amount' => 'nullable|numeric',
            'dish_amount' => 'nullable|numeric',
            'guard_amount' => 'nullable|numeric',
            'electricity_amount' => 'nullable|numeric',
            'adjust_amount' => 'nullable|numeric',
            'collection_amount' => 'required|numeric',
            'due_amount' => 'nullable|numeric',
            'water_type' => 'nullable|string',
            'electricity_type' => 'nullable|string',
            'gas_type' => 'nullable|string',
        ]);

        $validatedData['is_due'] = isset($validatedData['due_amount']) && $validatedData['due_amount'] > 0;

        Collection::create($validatedData);
        // jokhon tar checkout confirm thakbe tokhon if condition diye
        if($request->adjust_amount > 0){

            $customerId = $validatedData['customer_id'];

            $customerInfo = CustomerExtra::where('customer_id',$customerId)->first();
            $advanceAmount = $customerInfo->advance_amount - $request->adjust_amount;
            $customerInfo->update([
                'advance_amount' => $advanceAmount,
            ]);

        }



        return redirect()->route('collection.index')->with('success','Collection save successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $collection = Collection::findOrFail($id);
        $due_log = DueLog::where('collection_id',$id)->get();

        // dd($due_log);
        return view('admin.collection.collection-details',compact('collection','due_log'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collection = Collection::findOrFail($id);
        $buildings = Building::where('status', 1)->get();
        $assets = Asset::all();
        return view('admin.collection.collection-edit', compact('collection','buildings','assets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'collection_date' => 'required|date',
            'collection_amount' => 'required|numeric',
            'due_amount' => 'required|numeric',
        ]);

        $collection = Collection::findOrFail($id);
        $collection->collection_date = $request->input('collection_date');
        $collection->collection_amount = $request->input('collection_amount');
        $collection->due_amount = $request->input('due_amount');
        $collection->is_due = $collection->due_amount > 0;
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
        // $assets = Asset::where('building_id',$buildingId)->get();
        $assets = Asset::where('building_id', $buildingId)
        ->whereHas('bookings', function ($query) {
            $query->where('status', 'confirmed');
        })->get();
        return response()->json($assets);
    }

    public function getAssetdetails($assetId)
    {
        $assets = Asset::with(['bookings','bookings.customer','bookings.customer.customerInfo','bookings.customer.collection','bookings.customer.checkout'])->find($assetId);
        // dd($assets);
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
                                                <td>Customer Name</td>
                                                <td>' . $collection->customer->client_name . '</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Phone Number</td>
                                                <td>' . $collection->customer->client_phone . '</td>
                                            </tr>
                                            <tr>
                                                <td>Employee Name</td>
                                                <td>' . ($collection->employee ? $collection->employee->name : "N/A") . '</td>
                                            </tr>
                                            <tr>
                                                <td>Collection Date</td>
                                                <td>' . $collection->collection_date . '</td>
                                            </tr>
                                            <tr>
                                                <td>Gas Bill Type</td>
                                                <td>' . $collection->gas_type . '</td>
                                            </tr>
                                            <tr>
                                                <td>Electricity Bill Type</td>
                                                <td>' . $collection->gas_type . '</td>
                                            </tr>
                                            <tr>
                                                <td>Water Bill Type</td>
                                                <td>' . $collection->gas_type . '</td>
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
                                            <tr>
                                                <td>Due</td>
                                                <td>' . $collection->due_amount . '</td>
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

    public function duePayment(Request $request)
    {
        // dd($request->all());
        $collection = Collection::findOrFail($request->collection_id);

        $collectedAmount = $collection->collection_amount + $request->input('collection_amount');
        $newDue = $request->input('due_amount');
        if($newDue == 0)
        {
            $isDue = 0;
        }else{
            $isDue = 1;
        }
        // dd($request->all(),$collectedAmount,$newDue);

        $collection->update([
            'collection_date' => $request->input('collection_date'),
            'collection_amount' => $collectedAmount,
            'due_amount' => $newDue,
            'is_due' => $isDue,
        ]);

        DueLog::create([
            'collection_id' => $request->input('collection_id'),
            'customer_id' => $request->input('customer_id'),
            'collection_date' => $request->input('collection_date'),
            'collection_month' => $request->input('collection_month'),
            'collection_amount' => $request->input('collection_amount'), // Use the correct one
            'due_amount' => $request->input('due_amount'),
        ]);


        Session::flash('success','Due payment successfull.');
        return response()->json(['status'=>200]);

    }


    public function getDues()
    {
        $collections = Collection::where('due_amount','!=', 0)->get();
        return view('admin.collection.collection-due-list',compact('collections'));
    }

}
