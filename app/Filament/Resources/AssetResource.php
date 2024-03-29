<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Flag;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;

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
                        ),
                    Repeater::make('attributes')
                        ->schema(
                            [
                                TextInput::make('attribute')->required(),
                                TextInput::make('value')->required(),
                            ]
                        ),
                    SpatieMediaLibraryFileUpload::make('attachments')
                        ->multiple()
                        ->responsiveImages(),
                    SpatieMediaLibraryFileUpload::make('files')
                        ->multiple()
                        ->enableReordering()
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
                Tables\Columns\TextColumn::make('type_id'),
                ColorColumn::make('flag_id'),
            ])
            ->filters([
                Filter::make('is_fixed')->toggle(),
                Filter::make('is_location')->toggle(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function getTableFiltersFormWidth(): string
    {
        return '2xl';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'view' => Pages\ViewAsset::route('/{record}'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
