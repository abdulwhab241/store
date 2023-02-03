<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\OrderedItem;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderedItemResource\Pages;
use App\Filament\Resources\OrderedItemResource\RelationManagers;

class OrderedItemResource extends Resource
{
    protected static ?string $model = OrderedItem::class;


    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static ?string $navigationGroup = 'إدارة الطلبات';
    protected static ?string $navigationLabel = 'تصنيفات الطلبات';
    protected static ?string $pluralModelLabel  = 'تصنيفات الطلبات';
    protected static ?int $navigationSort = 4;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.id')->sortable()->label('رقم الطلب'),
                TextColumn::make('product.name')->label('المنتج')->sortable()->searchable(),
                TextColumn::make('price')->label('السعر')->sortable(),
                TextColumn::make('quantity')->label('الكمية')->sortable(),
                TextColumn::make('created_at')->label('تاريخ إرسال الطلب')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                
                ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),

            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderedItems::route('/'),
        ];
    }    
}
