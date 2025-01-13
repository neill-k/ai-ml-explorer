<?php

namespace App\Filament\Resources\UseCaseResource\Pages;

use App\Filament\Resources\UseCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUseCases extends ListRecords
{
    protected static string $resource = UseCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
