<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogCategoryResource\Pages;
use App\Filament\Resources\LogCategoryResource\RelationManagers;
use App\Models\LogCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Filters\Layout;
use Filament\Forms\Components\ColorPicker;

class LogCategoryResource extends Resource
{
    protected static ?string $model = LogCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\MarkdownEditor::make('description')->required(),
                ColorPicker::make('color')->rgb(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                ColorColumn::make('color'),
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
            'index' => Pages\ListLogCategories::route('/'),
            'create' => Pages\CreateLogCategory::route('/create'),
            'edit' => Pages\EditLogCategory::route('/{record}/edit'),
        ];
    }
}
