<?php

namespace App\Filament\Resources\RentalItemResource\Pages;

use App\Filament\Resources\RentalItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalItems extends ListRecords
{
    protected static string $resource = RentalItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
