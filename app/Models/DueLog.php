<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'collection_id',
        'customer_id',
        'collection_date',
        'collection_month',
        'collection_amount',
        'due_amount'
    ];
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
