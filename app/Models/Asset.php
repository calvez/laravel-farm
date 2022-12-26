<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Asset extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'notes',
        'type_id',
        'is_location',
        'is_fixed',
        'flag_id',
        'status',
        'attachments',
        'media',
    ];

    protected $casts = [
        'is_location' => 'boolean',
        'is_fixed' => 'boolean',
    ];
}
