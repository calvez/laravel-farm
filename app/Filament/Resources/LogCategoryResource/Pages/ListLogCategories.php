<?php

namespace App\Filament\Resources\LogCategoryResource\Pages;

use App\Filament\Resources\LogCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogCategories extends ListRecords
{
    protected static string $resource = LogCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
