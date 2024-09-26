<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
                'unit_name',
                'asset_code',
                'building_id',
                'location_id',
                'floor_id',
                'gas_type',
                'gas_owner_part_amount',
                'gas_rental_part_amount',
                'lift_facility',
                'electricity_type',
                'e_owner_part_amount',
                'e_rental_part_amount',
                'water_type',
                'water_owner_part_amount',
                'water_rental_part_amount',
                'unit_view',
                'unit_size',
                'monthly_rent',
                'service_charge',
                'others_charge',
                'available_from',
                'others_description',
                'employee_id',
                'status',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
