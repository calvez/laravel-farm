<?php

namespace App\Filament\Resources\FlagResource\Pages;

use App\Filament\Resources\FlagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFlag extends EditRecord
{
    protected static string $resource = FlagResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
