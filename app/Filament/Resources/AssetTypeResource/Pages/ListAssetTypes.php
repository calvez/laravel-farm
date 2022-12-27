<?php

namespace App\Filament\Resources\AssetTypeResource\Pages;

use App\Filament\Resources\AssetTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetTypes extends ListRecords
{
    protected static string $resource = AssetTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
