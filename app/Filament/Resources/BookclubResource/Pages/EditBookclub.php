<?php

namespace App\Filament\Resources\BookclubResource\Pages;

use App\Filament\Resources\BookclubResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookclub extends EditRecord
{
    protected static string $resource = BookclubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
