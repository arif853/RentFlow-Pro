<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'asset_id',
        'room_type_id',
        'room_size',
        'room_image',
        'electricity',
        'aircondition',
        'attach_toilet',
        'attach_baranda',
        'has_window',
        'others',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'room_id');
    }

    public function roomtype()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
