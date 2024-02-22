<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalSetting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'system_name',
        'system_email',
        'contact',
        'footer_text',
        'system_logo',
        'created_by',
    ];
}
