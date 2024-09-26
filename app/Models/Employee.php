<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['employee_code', 'name', 'email', 'phone', 'alternative_phone',
            'present_address', 'permanent_address', 'nid_number',
            'other_documents_type', 'designation_id', 'date_of_joining', 'status'
            ,'nid_front','nid_back','documents_photo','passport_photo','signature'];

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
