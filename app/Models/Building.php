<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['building_name',
                            'building_type',
                            'total_floor',
                            'address',
                            'building_code',
                            'location_id',
                            'employee_id',
                            'security_guard_name',
                            'guard_contact_number',
                            'gate_open_time',
                            'gate_close_time',
                            'status'
                            ];

    public function location()
    {
       return $this->belongsTo(Location::class, 'location_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }
}
