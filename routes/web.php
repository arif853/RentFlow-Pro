<?php

use Carbon\Carbon;
use App\Models\Asset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RoomtypeController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DesignationController;
use Illuminate\Support\Facades\Log;

Route::get('/cache_clear',function(){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success','Cache cleard!!');
});

Route::get('/storage_link',function(){
    Artisan::call('storage:link');
    return redirect()->back()->with('success','Storage link complete!!');
    // return "Storage Linked";
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {

    // Get the first and last dates of the next month
    $nextMonthStart = Carbon::now()->addMonthNoOverflow()->startOfMonth();
    $nextMonthEnd = $nextMonthStart->copy()->endOfMonth();

    // Query for available units
    $availableUnits = Asset::where('status', '1') // Assuming '1' means available
        ->where('available_from', '>=', $nextMonthStart) // Units available from next month or earlier
        ->whereDoesntHave('bookings', function ($query) use ($nextMonthStart, $nextMonthEnd) {
            $query->where(function ($q) use ($nextMonthStart, $nextMonthEnd) {
                $q->whereBetween('created_at', [$nextMonthStart, $nextMonthEnd]); // Adjust dates based on your booking dates
            });
        })
        ->get();

    $availableunitCount = $availableUnits->count();
    $assets = Asset::orderBy('created_at', 'desc')->paginate(5);

    return view('admin.dashboard',['assets'=> $assets, 'availableunitCount' => $availableunitCount]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('/dashboard/roomtype', RoomTypeController::class);
    Route::resource('/dashboard/floors', FloorController::class);
    Route::resource('/dashboard/locations', LocationController::class);
    Route::resource('/dashboard/building', BuildingController::class);

    Route::get('/dashboard/locations/location-list/{id}',[BuildingController::class, 'locationList']);
    Route::get('/dashboard/building/employee_details/{id}', [BuildingController::class, 'getEmployeeDetails']);
    Route::get('/dashboard/building/building_details/{id}', [AssetController::class, 'getBuildingDetails']);
    Route::get('/dashboard/room-types',[AssetController::class, 'getRoomType']);

    Route::resource('/dashboard/employee', EmployeeController::class);
    Route::resource('/dashboard/designation', DesignationController::class);
    Route::resource('/dashboard/asset', AssetController::class);

    // Booking Resource Routes
    Route::resource('/dashboard/booking', BookingController::class);
    // Booking Other Routes
    Route::get('/dashboard/booking/approval/list', [BookingController::class, 'approvalList']);
    Route::get('/dashboard/booking/step/{booking}/second-step', [BookingController::class, 'secondStep'])->name('booking.step2');
    Route::get('/dashboard/booking/step/{customer}/last-step', [BookingController::class, 'lastStep'])->name('booking.step3');
    Route::post('/dashboard/booking/step/{customer}/final-step', [BookingController::class, 'BookingFinalSubmit'])->name('booking.final');

    Route::get('/dashboard/booking/status/{booking}/update', [BookingController::class, 'bookingApproved'])->name('booking.approved');

    Route::get('/dashboard/booking/get-buildings/{id}', [BookingController::class, 'getBuildings']);
    Route::get('/dashboard/booking/get-asset/{id}', [BookingController::class, 'getAssets']);
    Route::get('/dashboard/booking/get-apartment-details/{id}', [BookingController::class, 'getApartmentDetails']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
