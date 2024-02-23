<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_class_id',
        'name',
        'currency_id',
        'amount',
        'is_active',
        'created_by',
    ];

    public function academicClass(){
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function currency(){
        return $this->belongsTo(CurrencyType::class,'currency_id');
    }
}
