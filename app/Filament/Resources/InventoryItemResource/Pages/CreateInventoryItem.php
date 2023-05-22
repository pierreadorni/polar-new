<?php

namespace App\Filament\Resources\InventoryItemResource\Pages;

use App\Filament\Resources\InventoryItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateInventoryItem extends CreateRecord
{
    protected static string $resource = InventoryItemResource::class;

//    public function create(bool $another = false): void
//    {
//        // save image to disk and add path to model
//        $data = $this->form->getState();
//        $image = $data['image'];
//        $path = Storage::disk('public')->putFile('images', $image);
//        $this->record->image_path = $path;
//        parent::create($another);
//    }
}
