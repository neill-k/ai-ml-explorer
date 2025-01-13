<?php

namespace App\Filament\Resources\ModelDataTypeResource\Pages;

use App\Filament\Resources\ModelDataTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelDataTypes extends ListRecords
{
    protected static string $resource = ModelDataTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
