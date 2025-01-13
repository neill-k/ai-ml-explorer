<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlgorithmTypeResource\Pages;
use App\Filament\Resources\AlgorithmTypeResource\RelationManagers;
use App\Models\AlgorithmType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlgorithmTypeResource extends Resource
{
    protected static ?string $model = AlgorithmType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAlgorithmTypes::route('/'),
            'create' => Pages\CreateAlgorithmType::route('/create'),
            'edit' => Pages\EditAlgorithmType::route('/{record}/edit'),
        ];
    }
}
