<?php

namespace App\Filament\Resources\ModelDataTypeResource\Pages;

use App\Filament\Resources\ModelDataTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModelDataType extends EditRecord
{
    protected static string $resource = ModelDataTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
