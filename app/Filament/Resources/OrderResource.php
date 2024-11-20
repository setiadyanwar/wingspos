<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        TextInput::make('name')
                            ->label('Costumer Name')
                            ->dehydrated()
                            ->required(),
                        Select::make('payment_method')
                            ->label('Payment Method')
                            ->options([
                                'cash' => 'Cash',
                                'transfer' => 'Transfer',
                                'qris'=>'QRIS',
                            ])
                            ->required(),
                        Select::make('payment_status')
                            ->label('Payment Status')
                            ->options([
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'failed' => 'Failed',
                            ])
                            ->default('processing')
                            ->required(),
                        ToggleButtons::make('status')
                            ->inline()
                            ->label('Status Order')
                            ->options([
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->colors([
                                'processing' => 'warning',
                                'completed' => 'success',
                                'cancelled' => 'danger',
                            ])
                            ->icons([
                                'processing' => 'heroicon-o-clock',
                                'completed' => 'heroicon-o-check-circle',
                                'cancelled' => 'heroicon-o-x-circle',
                            ])
                            ->default('processing')
                            ->required(),
                        TextInput::make('order_date')
                            ->label('Order Date')
                            ->required()
                            ->default(fn() => now()) 
                            ->disabled() 
                            ->dehydrated(), 
                        FileUpload::make('invoice')
                            ->label('Invoice Upload')
                            ->directory('invoices')  
                            ->visibility('public') 
                            ->dehydrated() 
                            ->columnSpanFull()
                            ->disk('public')  
                            ->required()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->columnSpan(1),  
                        Textarea::make('note')
                            ->label('Note')
                            ->dehydrated()
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Order Details')->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product','nama_produk')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->columnSpan(3)
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, Set $set)=> $set('unit_amount', Product::find($state)?->harga_produk)??0)
                                    ->afterStateUpdated(fn($state, Set $set)=> $set('total_amount', Product::find($state)?->harga_produk)??0)
                                    ->afterStateUpdated(fn ($state, Set $set) => $set('category_name', Product::find($state)?->category->name ?? 'Tidak ada kategori')),

                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->columnSpan(2)
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, Set $set, Get $get)=> $set('total_amount', $state*$get('unit_amount'))),
                                
                                TextInput::make('category_name')
                                    ->disabled()
                                    ->required()
                                    ->dehydrated()  
                                    ->columnSpan(3),
                                
                                TextInput::make('unit_amount')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),
                                
                                TextInput::make('total_amount')
                                    ->numeric()
                                    ->required()
                                    ->dehydrated()
                                    ->columnSpan(3),
                            ])->columns(12),
                            

                            Placeholder::make('total_placeholder')
                                ->label('Total Amount')
                                ->content(function(Get $get, Set $set){
                                    $total = 0;
                                    if(!$repeaters = $get('items')){
                                        return $total;
                                    }
                                    $set('total_placeholder', $total);
                                    foreach($repeaters as $key => $repeater){
                                        $total += $get("items.{$key}.total_amount");
                                    }

                                    return Number::currency($total, 'IDR');
                                }),
                                Hidden::make('total_amount')
                                    ->dehydrated()
                                    ->default(0)
                                    ->columnSpanFull(),
                                
                                Hidden::make('category_id')
                                    ->dehydrated()
                                    ->default(null)
                                    ->reactive()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => 
                                        $set('category_id', Product::find($get('product_id'))?->category_id ?? null)
                                    ),
                                Hidden::make('category_id')
                                    ->dehydrated()
                                    ->default(fn(Get $get) => $get('items.0.category_id') ?? null),
                    ])
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Costumer Name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('category.name')  
                    ->sortable()
                    ->label('Category')
                    ->searchable()
                    ->badge()
                    ->toggleable(), 

                TextColumn::make('total')  
                    ->label('Total Amount')
                    ->getStateUsing(fn ($record) => $record->items->sum('total_amount'))  // Hitung total dari relasi items
                    ->money('IDR', locale: 'id')
                    ->sortable(),
    
                TextColumn::make('items_count')  // Jumlah item dalam order
                    ->label('Total Items')
                    ->getStateUsing(fn ($record) => $record->items->count())
                    ->sortable(),

                SelectColumn::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ])
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('status')
                    ->label('Status Order')
                    ->options([
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]), 
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
