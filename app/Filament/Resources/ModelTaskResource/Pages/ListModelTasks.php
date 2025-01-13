<?php

namespace App\Filament\Resources\ModelTaskResource\Pages;

use App\Filament\Resources\ModelTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelTasks extends ListRecords
{
    protected static string $resource = ModelTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
