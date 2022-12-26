<?php

namespace App\Filament\Resources\LogCategoryResource\Pages;

use App\Filament\Resources\LogCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLogCategory extends CreateRecord
{
    protected static string $resource = LogCategoryResource::class;
}
