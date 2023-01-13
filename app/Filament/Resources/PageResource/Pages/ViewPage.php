<?php

namespace App\Filament\Resources\PageResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\PageResource;

class ViewPage extends ViewRecord
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
