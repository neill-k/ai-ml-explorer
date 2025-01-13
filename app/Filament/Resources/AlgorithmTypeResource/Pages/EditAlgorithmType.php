<?php

namespace App\Filament\Resources\AlgorithmTypeResource\Pages;

use App\Filament\Resources\AlgorithmTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlgorithmType extends EditRecord
{
    protected static string $resource = AlgorithmTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
