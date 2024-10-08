<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
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
        $customer = Customer::find($id);
        $collections = Collection::where('customer_id', $customer->id)->get();

        // Group collections by year from the month field
        $groupedCollections = $collections->groupBy(function ($collection) {
            // Extract the year from the month field (MM/YYYY)
            $date = \Carbon\Carbon::createFromFormat('m/Y', $collection->month);
            return $date->format('Y'); // Return the year
        });

        return view('admin.customer.customer-details', compact('customer', 'groupedCollections'));

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
}
