<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_phone',
        'client_email',
        'father_name',
        'birthday',
        'education_status',
        'occupation',
        'job_place_name',
        'job_place_address',
        'religion',
        'blood_group',
        'gender',
        'present_address',
        'permanent_address',
        'nid_number',
        'nid_front',
        'nid_back',
        'other_document',
        'document_photo',
        'marriage_status',
        'spouse_name',
        'spouse_phone',
        'spouse_nid',
        's_nid_front',
        's_nid_back',
        'emergency_contact_name',
        'emergency_contact_relation',
        'emergency_contact_phone',
        'emergency_contact_address'
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function customerInfo()
    {
        return $this->hasOne(CustomerExtra::class);
    }
}
