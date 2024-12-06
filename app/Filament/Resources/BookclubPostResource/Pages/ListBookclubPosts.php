<?php

namespace App\Filament\Resources\BookclubPostResource\Pages;

use App\Filament\Resources\BookclubPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookclubPosts extends ListRecords
{
    protected static string $resource = BookclubPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
