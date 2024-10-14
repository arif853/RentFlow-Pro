<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'asset_id',
        'employee_id',
        'month',
        'availability_date',
        'notes',
        'customer_id'
    ];
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

}
