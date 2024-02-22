<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'academic_class_id',
        'subject_id',
        'is_active',
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
