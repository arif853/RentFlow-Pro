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
                    <title>Collection Report</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 12px;
                            color: #000;
                            margin: 20px;
                        }
                        h1 {
                            font-size: 18px;
                            font-weight: bold;
                            margin-bottom: 10px;
                            text-align: center;
                        }
                        h2 {
                            font-size: 14px;
                            font-weight: bold;
                            margin-top: 20px;
                            margin-bottom: 10px;
                            border-bottom: 1px solid #000;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }
                        th, td {
                            padding: 8px;
                            text-align: left;
                            border-bottom: 1px solid #ddd;
                        }
                        th {
                            font-weight: bold;
                        }
                        .narrow {
                            padding: 6px;
                        }
                        .right {
                            text-align: right;
                        }
                        .table-section {
                            margin-bottom: 20px;
                        }
                    </style>
                </head>
                <body>

                    <h1>Collection Report</h1>

                    <table>
                        <tbody>
                            <tr>
                                <th>Complex</th>
                                <td class="right">' . ($collection->building ? $collection->building->building_name . ", " . $collection->building->building_code : 'N/A') . '</td>
                            </tr>
                            <tr>
                                <th>Unit Name</th>
                                <td class="right">' . $collection->asset->unit_name . '</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td class="right">' . $collection->customer->client_name . '</td>
                            </tr>
                            <tr>
                                <th>Customer Phone</th>
                                <td class="right">' . $collection->customer->client_phone . '</td>
                            </tr>
                            <tr>
                                <th>Employee Name</th>
                                <td class="right">' . ($collection->employee ? $collection->employee->name : "N/A") . '</td>
                            </tr>
                            <tr>
                                <th>Collection Date</th>
                                <td class="right">' . $collection->collection_date . '</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Billing Details</h2>
                    <table>
                        <tbody>
                            <tr>
                                <th>Gas Bill</th>
                                <td class="right">' . number_format($collection->gas_amount ? $collection->gas_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Electricity Bill</th>
                                <td class="right">' . number_format($collection->electricity_amount ? $collection->electricity_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Water Bill</th>
                                <td class="right">' . number_format($collection->water_amount ? $collection->water_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Internet Bill</th>
                                <td class="right">' . number_format($collection->internet_amount ? $collection->internet_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Dish Bill</th>
                                <td class="right">' . number_format($collection->dish_amount ? $collection->dish_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Guard Bill</th>
                                <td class="right">' . number_format($collection->guard_amount ? $collection->guard_amount : 0, 2) . '</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Rent and Charges</h2>
                    <table>
                        <tbody>
                            <tr>
                                <th>Monthly Rent</th>
                                <td class="right">' . number_format($collection->asset->monthly_rent ? $collection->asset->monthly_rent : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Service Charge</th>
                                <td class="right">' . number_format($collection->asset->service_charge ? $collection->asset->service_charge : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Other Charges</th>
                                <td class="right">' . number_format($collection->asset->others_charge ? $collection->asset->others_charge : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Total Payable Rent</th>
                                <td class="right">' . number_format($collection->payable_amount ? $collection->payable_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Collection Amount</th>
                                <td class="right">' . number_format($collection->collection_amount ? $collection->collection_amount : 0, 2) . '</td>
                            </tr>
                            <tr>
                                <th>Due</th>
                                <td class="right">' . number_format($collection->due_amount ? $collection->due_amount : 0, 2) . '</td>
                            </tr>
                        </tbody>
                    </table>

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
