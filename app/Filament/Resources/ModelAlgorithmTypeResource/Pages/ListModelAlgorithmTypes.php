<?php

namespace App\Filament\Resources\ModelAlgorithmTypeResource\Pages;

use App\Filament\Resources\ModelAlgorithmTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelAlgorithmTypes extends ListRecords
{
    protected static string $resource = ModelAlgorithmTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
