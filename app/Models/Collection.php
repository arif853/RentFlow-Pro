<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'asset_id',
        'customer_id',
        'employee_id',
        'collection_date',
        'month',
        'payable_amount',
        'collection_amount',
        'due_amount',
        'water_amount',
        'gas_amount',
        'electricity_amount',
        'gas_type',
        'electricity_type',
        'water_type',
        'is_due',
        'internet_amount' ,
        'dish_amount',
        'guard_amount',
        'adjust_amount',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function due_log()
    {
        return $this->belongsTo(DueLog::class);
    }
}
