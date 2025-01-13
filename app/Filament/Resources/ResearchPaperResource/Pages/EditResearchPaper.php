<?php

namespace App\Filament\Resources\ResearchPaperResource\Pages;

use App\Filament\Resources\ResearchPaperResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResearchPaper extends EditRecord
{
    protected static string $resource = ResearchPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
