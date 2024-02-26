<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'year_id',
        'is_active',
    ];

    public function class()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id'); // Replace "Class" with your class model name
    }
}
