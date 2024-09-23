<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =[
        'location_id',
        'building_id',
        'floor_id',
        'asset_id',
        'customer_id',
        'status'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
