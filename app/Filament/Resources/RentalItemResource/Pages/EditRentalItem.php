<?php

namespace App\Filament\Resources\RentalItemResource\Pages;

use App\Filament\Resources\RentalItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalItem extends EditRecord
{
    protected static string $resource = RentalItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
