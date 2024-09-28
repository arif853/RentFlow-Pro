<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Collection;
use App\Models\Employee;
use App\Models\Floor;
use App\Models\Location;
use App\Models\RoomType;
use App\Models\User;
use App\Policies\AssetPolicy;
use App\Policies\BuildingPolicy;
use App\Policies\CheckoutPolicy;
use App\Policies\CollectionPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\FloorPolicy;
use App\Policies\LocationPolicy;
use App\Policies\RoomTypePolicy;
use App\Policies\UserPolicy;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        Asset::class => AssetPolicy::class,
        Building::class => BuildingPolicy::class,
        Checkout::class => CheckoutPolicy::class,
        Collection::class => CollectionPolicy::class,
        Employee::class => EmployeePolicy::class,
        Floor::class => FloorPolicy::class,
        Location::class => LocationPolicy::class,
        RoomType::class => RoomTypePolicy::class,
        User::class => UserPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
