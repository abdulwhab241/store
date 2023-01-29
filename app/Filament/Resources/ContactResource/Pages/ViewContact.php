<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Tables;
// use Filament\Pages\Actions;
use Filament\Resources\Table;
use Filament\Pages\Actions\ViewAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ContactResource;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;
    public static function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            ViewAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
        
                        return $data;
                    })
        ]);
}

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             // ...
    //         ])
    //         ->actions([
    //             Tables\Actions\ViewAction::make(),
    //             // ...
    //         ]);
    // }
    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     ViewAction::make()
    //         ->mutateRecordDataUsing(function (array $data):  {
    //             $data['user_id'] = auth()->id();

    //             return $data;
    //         });
    // }
    // ViewAction::make()
    // ->mutateRecordDataUsing(function (array $data): array {
    //     $data['user_id'] = auth()->id();

    //     return $data;
    // })

    // protected function getActions(): array
    // {
    //     return [
    //         Tables\Actions\ViewAction::make(),
    //     ];
    // }
}
