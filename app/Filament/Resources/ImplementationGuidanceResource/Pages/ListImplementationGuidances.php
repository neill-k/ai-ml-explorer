<?php

namespace App\Filament\Resources\ImplementationGuidanceResource\Pages;

use App\Filament\Resources\ImplementationGuidanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImplementationGuidances extends ListRecords
{
    protected static string $resource = ImplementationGuidanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
