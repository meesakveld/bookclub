<?php

namespace App\Filament\Resources\BookclubResource\Pages;

use App\Filament\Resources\BookclubResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookclubs extends ListRecords
{
    protected static string $resource = BookclubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
