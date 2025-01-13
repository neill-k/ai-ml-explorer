<?php

namespace App\Filament\Resources\ModelFrameworkResource\Pages;

use App\Filament\Resources\ModelFrameworkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModelFramework extends EditRecord
{
    protected static string $resource = ModelFrameworkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
