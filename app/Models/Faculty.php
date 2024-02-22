<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'placeofbirth',
        'contact',
        'email_address',
        'current_address',
        'year_of_employment',
        'qualifications',
        'is_active',
        'emergency_contact_person',
        'emergency_contact_number',
        'relationship',
        'user_id',
        'created_by',
        'position_id',
        'marital_status_id',
        'user_id',
        'gender_id',
    ];

    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }

    public function maritalStatus(){
        return $this->belongsTo(MaritalStatus::class,'marital_status_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
