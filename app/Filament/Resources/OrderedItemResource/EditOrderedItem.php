<?php

namespace App\Filament\Resources\OrderedItemResource\Pages;

use App\Filament\Resources\OrderedItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = OrderedItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
