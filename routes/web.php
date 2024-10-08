<?php

use Carbon\Carbon;
use App\Models\Asset;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RoomtypeController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DesignationController;
use App\Models\Checkout;

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

})->middleware(['auth', 'verified','is_user_active'])->name('dashboard');

Route::middleware(['auth','is_user_active'])->group(function () {

    Route::resource('/dashboard/roomtype', RoomTypeController::class);
    Route::resource('/dashboard/floors', FloorController::class);
    Route::resource('/dashboard/locations', LocationController::class);
    Route::resource('/dashboard/building', BuildingController::class);

    Route::get('/dashboard/locations/location-list/{id}',[BuildingController::class, 'locationList']);
    Route::get('/dashboard/building/employee_details/{id}', [BuildingController::class, 'getEmployeeDetails']);

    Route::resource('/dashboard/employee', EmployeeController::class);
    Route::resource('/dashboard/designation', DesignationController::class);

    // Asset
    Route::resource('/dashboard/asset', AssetController::class);
    Route::get('/dashboard/building/building_details/{id}', [AssetController::class, 'getBuildingDetails']);
    Route::get('/dashboard/room-types',[AssetController::class, 'getRoomType']);
    Route::get('/dasboard/asset/room-delete/{room}', [AssetController::class, 'assetRoomDelete'])->name('asset.room.delete');

    // Booking Resource Routes
    Route::resource('/dashboard/booking', BookingController::class);
    // Booking Other Routes
    Route::get('/dashboard/booking/approval/list', [BookingController::class, 'approvalList']);
    Route::get('/dashboard/booking/step/{booking}/second-step', [BookingController::class, 'secondStep'])->name('booking.step2');
    Route::get('/dashboard/booking/step/{customer}/last-step', [BookingController::class, 'lastStep'])->name('booking.step3');
    Route::post('/dashboard/booking/step/{customer}/final-step', [BookingController::class, 'BookingFinalSubmit'])->name('booking.final');
    Route::get('/dashboard/booking/member/{id}/delete', [BookingController::class, 'BookingMemberDelete'])->name('booking.member.delete');

    Route::get('/dashboard/booking/report/DMP-from/printPDF', [BookingController::class, 'formPrint'])->name('booking.printPDF');
    Route::get('/dashboard/booking/status/{booking}/update', [BookingController::class, 'bookingApproved'])->name('booking.approved');

    Route::get('/dashboard/booking/get-buildings/{id}', [BookingController::class, 'getBuildings']);
    Route::get('/dashboard/booking/get-asset/{id}', [BookingController::class, 'getAssets']);
    Route::get('/dashboard/booking/get-apartment-details/{id}', [BookingController::class, 'getApartmentDetails']);

    // collection
    Route::resource('/dashboard/collection', CollectionController::class);
    Route::get('/dashboard/collection/{id}/print', [CollectionController::class, 'print'])->name('collection.print');
    Route::get('/dashboard/collection/get-asset/{complex_id}', [CollectionController::class,'getAssets']);
    Route::get('/dashboard/collection/get-asset-details/{asset_id}', [CollectionController::class,'getAssetdetails']);
    Route::get('/dashboard/collection/get-employee-details/{employee_id}', [CollectionController::class,'getEmployeedetails']);
    Route::get('/dashboard/collection/due/list', [CollectionController::class,'getDues'])->name('collection.due');
    Route::post('/dashboard/collection/due/payment',[CollectionController::class, 'duePayment'])->name('collection.due.payment');

    Route::resource('/dashboard/checkout',CheckoutController::class);
    Route::get('/dashboard/checkout/approval/list/', [CheckoutController::class,'checkoutApprovalList'])->name('checkout.approval.list');
    Route::get('/dashboard/checkout/approval/list/approve/{checkout_id}', [CheckoutController::class,'checkoutApproval'])->name('checkout.approval.list.approve');
    Route::get('/dashboard/collection/checkout/get-asset/{complex_id}', [CheckoutController::class,'getAssets']);
    Route::get('/dashboard/collection/checkout/get-asset-details/{asset_id}', [CheckoutController::class,'getAssetdetails']);
    Route::get('/dashboard/collection/get/collection/details/{customer_id}', [CheckoutController::class,'CustomerDue'])->name('collection.customer.due');

    Route::resource('/dashboard/customer',CustomerController::class);

    // User Managment
    Route::controller(UserController::class)->group(function(){
        Route::get('/dashboard/users/index', 'index')->name('users.index');
        Route::post('/dashboard/users/store', 'store')->name('users.store');
        Route::get('/dashboard/users/edit', 'edit')->name('users.edit');
        Route::post('/dashboard/users/update', 'update')->name('users.update');
        Route::delete('/dashboard/users/{userId}/delete', 'destroy');
        Route::get('/dashboard/users/dective_user/{id}', 'deactivateUser')->name('user.deactive');
    });

    // user role permission
    Route::resource('/dashboard/user/roles', RoleController::class);
    Route::post('/dashboard/users/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/dashboard/users/roles/{id}/delete', [RoleController::class, 'destroy']);

    Route::get('/dashboard/users/roles/{roleId}/give-permissions',[RoleController::class, 'addPermission']);
    Route::put('/dashboard/users/roles/{roleId}/give-permissions',[RoleController::class, 'addPermissionToRole']);

    Route::resource('/dashboard/users/permissions', PermissionController::class);
    Route::post('/dashboard/users/permissions/{permission}',[PermissionController::class, 'update']);
    // Route::delete('/dashboard/users/permissions/{id}/delete',[PermissionController::class, 'destroy']);
    Route::delete('/dashboard/users/permissions/bulkdelete', [PermissionController::class, 'bulkDelete'])->name('permissions.bulk_delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
