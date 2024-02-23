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
        'sponsor_id',
        'created_by',
    ];

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function leveltype(){
        return $this->belongsTo(LevelType::class, 'level_types_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'sponsor_id');
    }
}
