<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlagResource\Pages;
use App\Models\Flag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\ColorPicker;
use Filament\Tables\Columns\ColorColumn;

class FlagResource extends Resource
{
    protected static ?string $model = Flag::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\MarkdownEditor::make('description')->required(),
                    ColorPicker::make('color')->rgb()
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                ColorColumn::make('color')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFlags::route('/'),
            'create' => Pages\CreateFlag::route('/create'),
            'edit' => Pages\EditFlag::route('/{record}/edit'),
        ];
    }
}
