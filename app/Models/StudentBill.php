<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_class_id',
        'narration',
        'amount',
        'currency_id',
        'is_registration',
        'payment_status_id',
        'is_active',
        'created_by',
    ];
}
