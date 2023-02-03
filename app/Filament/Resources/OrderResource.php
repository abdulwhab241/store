<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;


    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static ?string $navigationGroup = 'إدارة الطلبات';
    protected static ?string $navigationLabel = 'الطلبات';
    protected static ?string $pluralModelLabel  = 'الطلبات';
    protected static ?int $navigationSort = 4;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('رقم الطلب'),
                TextColumn::make('user.name')->label('أسم العميل')->sortable()->searchable(),
                TextColumn::make('address')->label('العنوان')->sortable(),
                TextColumn::make('company_name')->label('أسم الشركة')->sortable(),
                TextColumn::make('city')->label('المدينة')->sortable(),
                TextColumn::make('phone')->label('رقم الهاتف')->sortable(),
                TextColumn::make('payment_method')->label('طريقة الدفع')->sortable(),
                TextColumn::make('order_notice')->label('ملاحظة الطلب')->sortable(),
                TextColumn::make('created_at')->label('تاريخ الارسال')->dateTime()
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
            'index' => Pages\ListOrders::route('/'),
        ];
    }    
}
