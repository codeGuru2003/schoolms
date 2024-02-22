<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'year_id',
        'startdate',
        'enddate',
        'is_active',
        'name',
        'created_by',
    ];

    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
}
