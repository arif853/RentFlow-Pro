<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = ['building_id','floor_name','floor_size','total_unit','status'];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
