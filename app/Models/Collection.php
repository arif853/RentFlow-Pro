<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'asset_id',
        'employee_id',
        'collection_date',
        'collection_type',
        'month',
        'from_date',
        'to_date',
        'duration',
        'payable_amount',
        'collection_amount',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
