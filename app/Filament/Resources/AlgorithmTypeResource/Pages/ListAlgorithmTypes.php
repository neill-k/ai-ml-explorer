<?php

namespace App\Filament\Resources\AlgorithmTypeResource\Pages;

use App\Filament\Resources\AlgorithmTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlgorithmTypes extends ListRecords
{
    protected static string $resource = AlgorithmTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
