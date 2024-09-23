<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name','location_code','zip_code','google_map_link','picture','status'];

    public function building()
    {
        return $this->hasOne(Building::class,'location_id');
    }
}
