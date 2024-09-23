<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerExtra extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'members',
        'home_maid',
        'home_maid_name',
        'home_maid_phone',
        'home_maid_address',
        'home_maid_nid',
        'home_maid_nidfront',
        'home_maid_nidback',
        'driver',
        'driver_name',
        'driver_phone',
        'driver_address',
        'driver_nid',
        'driver_nidfront',
        'driver_nidback',
        'previous_householder_name',
        'previous_householder_phone',
        'previous_house_address',
        'left_reason',
        'actual_rent',
        'advance_amount_type',
        'advance_amount',
        'adjustable_amout_type',
        'adjustable_amount',
        'collection_date',
        'collection_last_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
