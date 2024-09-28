<?php

namespace App\Http\Controllers\Admin;

use misterspelik\LaravelPdf\Facades\Pdf as PDF;
use App\Models\Asset;
use App\Models\Floor;
use App\Models\Booking;
use App\Models\Building;
use App\Models\Customer;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\CustomerExtra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.booking-list',compact('bookings'));
    }

    public function approvalList()
    {
        $bookings = Booking::where('status', 'pending')->get();
        return view('admin.booking.pending-list',compact('bookings'));
    }

    public function bookingApproved(Booking $booking)
    {
        // dd($booking);
        if($booking->status == 'pending')
        {
            $booking->update([
                'status' => 'confirmed',
            ]);
        }
        return redirect()->back()->with('success', 'Booking has been confirmed successfully.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::where('status',1)->get();
        $buildings = Building::where('status', 1)->get();
        $floors = Floor::where('status',1)->get();
        return view('admin.booking.add-booking', compact('locations', 'buildings','floors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'building_id' => 'required|exists:buildings,id',
            'floor_id' => 'required|exists:floors,id',
            'asset_id' => 'required|exists:assets,id',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:15',
            'client_email' => 'nullable|email|max:255',
            'occupation' => 'required|string',
            'gender' => 'required|in:male,female',
            'nid_number' => 'required|string',
            'nid_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nid_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'other_document' => 'nullable|string',
            'document_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('nid_front')) {
            // Get the file
            $file = $request->file('nid_front');
            // Generate a unique file name
            $nidfront = 'nid_front_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $nidfront);

        }else {
            $nidfront = null;
        }
        if ($request->hasFile('nid_back')) {
            // Get the file
            $file = $request->file('nid_back');
            // Generate a unique file name
            $nidback = 'nid_back_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $nidback);
        }else {
            $nidback = null;
        }
        if ($request->hasFile('document_photo')) {
            // Get the file
            $file = $request->file('document_photo');
            // Generate a unique file name
            $document = 'document_photo_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/documents', $document);
        }else {
            $document = null;
        }
        // $documentPhotoPath = $request->file('document_photo') ? $request->file('document_photo')->store('documents', 'public') : null;
        try {
            DB::beginTransaction();

            $customer = Customer::create([
                'client_name' => $validated['client_name'],
                'client_phone' => $validated['client_phone'],
                'client_email' => $validated['client_email'],
                'occupation' => $validated['occupation'],
                'gender' => $validated['gender'],
                'nid_number' => $validated['nid_number'],
                'nid_front' => $nidfront,
                'nid_back' => $nidback,
                'other_document' => $validated['other_document'],
                'document_photo' => $document,
            ]);


            // Save the booking details
            $booking = new Booking();
            $booking->location_id = $validated['location_id'];
            $booking->building_id = $validated['building_id'];
            $booking->floor_id = $validated['floor_id'];
            $booking->asset_id = $validated['asset_id'];
            $booking->customer_id = $customer->id;

            $booking->status = 'pending'; // Example status handling
            $booking->save();

            DB::commit();
            // Redirect based on the action
            if ($request->action == 'next') {
                // Redirect to the next page
                return redirect()->route('booking.step2',['booking' => $booking->id])->with('success', 'Booking saved as draft.');
            }
            // Redirect back to the current page (for draft)
            return redirect()->back()->with('success', 'Booking saved as draft.');
        } catch (\Exception $e) {

            DB::rollBack();
            Log::alert('Booking Error: '.$e);
            return redirect()->back()->with('danger', 'Booking has error.');
        }
    }

    public function secondStep(Booking $booking)
    {
        return view('admin.booking.booking-step-two',compact('booking'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $booking = Booking::find($request->booking);
        return view('admin.booking.booking-details',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        // $booking = Booking::find($booking);
        return view('admin.booking.booking-step-two',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:15',
            'client_email' => 'nullable|email|max:255',
            'father_name' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'education_status' => 'nullable|string|max:255',
            'occupation' => 'required|string|in:Job Holder,Business,Service Provider',
            'job_place_name' => 'nullable|string|max:255',
            'job_place_address' => 'nullable|string|max:255',
            'religion' => 'nullable|string|in:Islam,Hiduism,Christan,Buddism',
            'blood_group' => 'nullable|string|max:3',
            'gender' => 'nullable|string|in:male,female',
            'present_address' => 'nullable|string|max:500',
            'permanent_address' => 'nullable|string|max:500',
            'nid_number' => 'nullable|string|max:20',
            'nid_front' => 'nullable|image|mimes:jpg,jpeg,png',
            'nid_back' => 'nullable|image|mimes:jpg,jpeg,png',
            'other_document' => 'nullable|string|in:Passport,Birth Certificate,Driving License',
            'document_photo' => 'nullable|file|mimes:jpg,jpeg,png',
            'marriage_status' => 'nullable|string|in:Married,Unmarried,Divorced',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_phone' => 'nullable|string|max:15',
            'spouse_nid' => 'nullable|string|max:20',
            's_nid_front' => 'nullable|image|mimes:jpg,jpeg,png',
            's_nid_back' => 'nullable|image|mimes:jpg,jpeg,png',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_relation' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:15',
            'emergency_contact_address' => 'nullable|string|max:15',
        ]);

        $customer = Customer::findOrFail($id);

        $booking = Booking::find($customer->booking->id);
        if($booking == 'pending')
        {
            $booking->update([
                'status' => 'confirmed',
            ]);
        }
        // dd($customer, $booking);
        // Update customer details
        $customer->update($request->all());

        if ($request->hasFile('nid_front')) {
            // Get the file
            $file = $request->file('nid_front');
            // Generate a unique file name
            $nidfront = 'nid_front_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $nidfront);

            if ($customer->nid_front) {
                $oldFilePath = 'public/booking/nids' . $customer->nid_front;
                Storage::delete($oldFilePath);
            }
            $customer->nid_front = $nidfront;
        }

        if ($request->hasFile('nid_back')) {
            // Get the file
            $file = $request->file('nid_back');
            // Generate a unique file name
            $nidback = 'nid_back_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $nidback);
            if ($customer->nid_back) {
                $oldFilePath = 'public/booking/nids' . $customer->nid_back;
                Storage::delete($oldFilePath);
            }
            $customer->nid_back = $nidback;
        }

        if ($request->hasFile('document_photo')) {
            // Get the file
            $file = $request->file('document_photo');
            // Generate a unique file name
            $document = 'document_photo_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/documents', $document);

            if ($customer->document_photo) {
                $oldFilePath = 'public/booking/nids' . $customer->document_photo;
                Storage::delete($oldFilePath);
            }
            $customer->document_photo = $document;
        }

        if ($request->hasFile('s_nid_front')) {
            // Get the file
            $file = $request->file('s_nid_front');
            // Generate a unique file name
            $sNID = 's_nid_front_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $document);

            if ($customer->s_nid_front) {
                $oldFilePath = 'public/booking/nids' . $customer->s_nid_front;
                Storage::delete($oldFilePath);
            }
            $customer->s_nid_front = $sNID;
        }

        if ($request->hasFile('s_nid_back')) {
            // Get the file
            $file = $request->file('s_nid_back');
            // Generate a unique file name
            $sNID = 's_nid_back_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/nids', $document);

            if ($customer->s_nid_back) {
                $oldFilePath = 'public/booking/nids' . $customer->s_nid_back;
                Storage::delete($oldFilePath);
            }
            $customer->s_nid_back = $sNID;
        }

        // Save updated customer details
        $customer->save();

        // dd($validateData);
        return redirect()->route('booking.step3',['customer' => $customer->id])->with('success', 'Booking has been updated successfully.');
    }

    public function lastStep(Customer $customer)
    {
        return view('admin.booking.booking-step-final',compact('customer'));
    }

    public function BookingFinalSubmit(Request $request, Customer $customer)
    {
        // Validate booking data
        $validatedData = $request->validate([
            'customer_id' => 'exists:customers,id',
            'members' => 'nullable|numeric|max:255',
            'home_maid' => 'nullable|string|max:255',
            'home_maid_name' => 'nullable|string|max:255',
            'home_maid_phone' => 'nullable|string|max:255',
            'home_maid_address' => 'nullable|string|max:255',
            'home_maid_nid' => 'nullable|string|max:255',
            'home_maid_nidfront' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
            'home_maid_nidback' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
            'driver' => 'nullable|string|max:255',
            'driver_name' => 'nullable|string|max:255',
            'driver_phone' => 'nullable|string|max:255',
            'driver_address' => 'nullable|string|max:255',
            'driver_nid' => 'nullable|string|max:255',
            'driver_nidfront' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
            'driver_nidback' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
            'previous_householder_name' => 'nullable|string|max:255',
            'previous_householder_phone' => 'nullable|string|max:255',
            'previous_house_address' => 'nullable|string|max:255',
            'left_reason' => 'nullable|string|max:255',
            'actual_rent' => 'nullable|string|max:255',
            'advance_amount_type' => 'nullable|string|max:255',
            'advance_amount' => 'nullable|string|max:255',
            'adjustable_amout_type' => 'nullable|string|max:255',
            'adjustable_amount' => 'nullable|string|max:255',
            'collection_date' => 'nullable|string|max:255',
            'collection_last_date' => 'nullable|string|max:255',
        ]);

        // Validate family member data
        $validatedFamilymember = $request->validate([
            'member_name.*' => 'nullable|string|max:255',
            'member_gender.*' => 'nullable|string|max:255',
            'member_relation.*' => 'nullable|string|max:255',
            'member_phone.*' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('home_maid_nidfront')) {
            // Get the file
            $file = $request->file('home_maid_nidfront');
            // Generate a unique file name
            $nidfront = 'home_maid_nidfront_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/extra/nids', $nidfront);

            if ($customer->customerInfo->home_maid_nidfront) {
                $oldFilePath = 'public/booking/extra/nids' . $customer->customerInfo->home_maid_nidfront;
                Storage::delete($oldFilePath);
            }
            $validatedData['home_maid_nidfront'] = $nidfront;

        }

        if ($request->hasFile('home_maid_nidback')) {
            // Get the file
            $file = $request->file('home_maid_nidback');
            // Generate a unique file name
            $nidback = 'home_maid_nidback_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/extra/nids', $nidback);
            if ($customer->customerInfo->home_maid_nidback) {
                $oldFilePath = 'public/booking/extra/nids' . $customer->customerInfo->home_maid_nidback;
                Storage::delete($oldFilePath);
            }
            $validatedData['home_maid_nidback'] = $nidback;
        }

        if ($request->hasFile('driver_nidfront')) {
            // Get the file
            $file = $request->file('driver_nidfront');
            // Generate a unique file name
            $nidfront = 'driver_nidfront_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/extra/nids', $nidfront);

            if ($customer->customerInfo->driver_nidfront) {
                $oldFilePath = 'public/booking/extra/nids' . $customer->customerInfo->driver_nidfront;
                Storage::delete($oldFilePath);
            }
            $validatedData['driver_nidfront'] = $nidfront;
        }

        if ($request->hasFile('driver_nidback')) {
            // Get the file
            $file = $request->file('driver_nidback');
            // Generate a unique file name
            $nidback = 'driver_nidback_' . time() . '.' . $file->getClientOriginalExtension();
            // Store the file in the 'locations' directory within 'storage/app/public'
            $path = $file->storeAs('public/booking/extra/nids', $nidback);
            if ($customer->customerInfo->driver_nidback) {
                $oldFilePath = 'public/booking/extra/nids' . $customer->customerInfo->driver_nidback;
                Storage::delete($oldFilePath);
            }
            $validatedData['driver_nidback'] = $nidback;
        }

        try {
            // dd($validatedData,$validatedFamilymember);
            DB::beginTransaction();
           // Store booking data
           $customerExtra = CustomerExtra::updateOrCreate(
                ['customer_id' => $request->customer_id],
                $validatedData
            );

            if (isset($validatedFamilymember['member_name'])) {
                foreach($validatedFamilymember['member_name'] as $i => $value) {
                    $memberName = $validatedFamilymember['member_name'][$i] ?? null;
                    if (!empty($memberName)) {
                        DB::table('family_member')->updateOrInsert(
                            ['customer_extra_id' => $customerExtra->id, 'member_name' => $memberName],
                            [
                                'member_gender' => $validatedFamilymember['member_gender'][$i] ?? null,
                                'member_relation' => $validatedFamilymember['member_relation'][$i] ?? null,
                                'member_phone' => $validatedFamilymember['member_phone'][$i] ?? null,
                            ]
                        );
                    }
                }
            }
            DB::commit();
            // Return success response or redirect
            return redirect()->route('booking.index')->with('success', 'Booking data submitted successfully. Thank You');
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::info($e);
            return redirect()->back()->with('danger','Booking error, check log.');
        }

    }

    public function BookingMemberDelete($id)
    {
        DB::table('family_member')->where('id', $id)->delete();
        return redirect()->back()->with('danger', 'Member removed succefully!');
    }

    public function formPrint()
    {
        $data = [
            'name' => 'Arif Hossen',
        ];
        $pdf = PDF::loadView('admin.booking.rentantform',$data);
        return $pdf->download('document.pdf');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getBuildings($id)
    {
        // Fetch buildings associated with the selected location
        $buildings = Building::where('location_id', $id)->where('status', 1)->get();

        // Return buildings as a JSON response
        return response()->json(['buildings' => $buildings]);
    }

    public function getAssets($id)
    {
        $assets = Asset::where('floor_id', $id)->where('status', 1)->get();

        // Return Assets as a JSON response
        return response()->json(['assets' => $assets]);
    }

    public function getApartmentDetails($id)
    {
        // Fetch the apartment with room details and count grouped by room type
        $apartment = Asset::with(['rooms.roomType'])
            ->where('id', $id)
            ->first();

        if (!$apartment) {
            return response()->json(['error' => 'Apartment not found'], 404);
        }

        // Group rooms by type and count them
        $roomCounts = $apartment->rooms
            ->groupBy('room_type_id')
            ->map(function ($group) {
                $roomType = $group->first()->roomType->roomType;
                return [
                    'type' => $roomType,
                    'count' => $group->count(),
                ];
            })
            ->values();

        return response()->json([
            'apartment' => $apartment,
            'roomCounts' => $roomCounts,
        ]);
    }
}
