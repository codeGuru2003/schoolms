<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'placeofbirth',
        'contact',
        'email_address',
        'current_address',
        'gender_id',
        'is_active',
        'emergency_contact_person',
        'emergency_contact_number',
        'relationship',
        'user_id',
        'created_by',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function studentclasses()
    {
        return $this->hasMany(StudentClass::class);
    }
}
