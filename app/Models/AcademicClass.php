<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicClass extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'level_types_id',
        'section_id',
        'created_by',
    ];
}
