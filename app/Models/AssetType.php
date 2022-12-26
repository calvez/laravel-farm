<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class AssetType extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'name', 'description',
    ];
}
