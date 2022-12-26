<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Flag;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('name')->required(),
                    Select::make('type_id')
                        ->label('Type')
                        ->options(AssetType::all()->pluck('name', 'id'))
                        ->searchable()->required(),
                    Forms\Components\MarkdownEditor::make('notes')->required(),
                    Toggle::make('is_fixed')->inline(),
                    Toggle::make('is_location')->inline(),
                    Select::make('flag_id')
                        ->label('Flag')
                        ->options(Flag::all()->pluck('name', 'id'))
                        ->searchable()->required(),
                    Repeater::make('id_tags')
                        ->schema(
                            [
                                TextInput::make('name')->required(),
                                TextInput::make('identification')->required(),
                            ]
                        )
                        ->columns(1),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\TextColumn::make('flag_id'),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
