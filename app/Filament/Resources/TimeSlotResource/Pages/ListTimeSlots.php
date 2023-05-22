<?php

namespace App\Filament\Resources\TimeSlotResource\Pages;

use App\Filament\Resources\TimeSlotResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeSlots extends ListRecords
{
    protected static string $resource = TimeSlotResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
