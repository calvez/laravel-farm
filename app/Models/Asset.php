<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'notes',
        'type_id',
        'is_location',
        'is_fixed',
        'flag_id',
        'status',
    ];

    protected $casts = [
        'is_location' => 'boolean',
        'is_fixed' => 'boolean',
    ];
}
