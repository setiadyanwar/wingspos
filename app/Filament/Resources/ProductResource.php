<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('nama_produk')
                        ->label('Nama Produk')
                        ->required(),

                    TextInput::make('harga_produk')
                        ->label('Harga Produk')
                        ->required()
                        ->type('number')
                        ->minValue(0) // Pastikan bahwa ini sesuai dengan kebutuhan Anda
                        ->maxValue(99999999),

                    TextInput::make('jumlah_stok')
                        ->label('Jumlah Stok')
                        ->required(),

                    Textarea::make('deskripsi_produk')               
                        ->label('Deskripsi Produk')
                        ->required(),

                    
                    FileUpload::make('gambar_produk')
                        ->label('Gambar Produk')
                        ->directory('products-images')
                        ->image()
                        ->required(),
                ])
                // Forms\Components\TextInput::make('nama_produk')
                //     ->label('Nama Produk')
                //     ->required(),
                // Forms\Components\TextInput::make('harga_produk')
                //     ->label('Harga Produk')
                //     ->required()
                //     ->type('number')
                //     ->minValue(0)
                //     ->maxValue(99999999.99),
                // Forms\Components\TextInput::make('jumlah_stok') // Use 'number' for numeric inputs
                //     ->label('Jumlah Stok')
                //     ->required(),
                // Forms\Components\Textarea::make('deskripsi_produk')               
                //     ->label('Deskripsi Produk')
                //     ->required(),
                // Forms\Components\FileUpload::make('gambar_produk')
                //     ->label('Gambar Produk')
                //     ->directory('products-images')
                //     ->image()
                //     ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('gambar_produk') // Menampilkan gambar
                ->label('Gambar Produk')
                ->disk('public')
                ->size(50)
                ->url(fn($record) => asset('storage/' . $record->gambar_produk)), 
            Tables\Columns\TextColumn::make('nama_produk')
                ->label('Nama Produk')
                ->searchable(),
            Tables\Columns\TextColumn::make('harga_produk')
                ->label('Harga Produk')
                ->money('IDR', locale: 'id')
                ->searchable(),
            Tables\Columns\TextColumn::make('jumlah_stok')
                ->label('Jumlah Stok')
                ->searchable(),
            Tables\Columns\TextColumn::make('deskripsi_produk')
                ->label('Deskripsi Produk')
                ->searchable(),
            

                // Kolom Debug URL Gambar
            // Tables\Columns\TextColumn::make('gambar_produk')
            // ->label('URL Gambar')
            // ->getStateUsing(fn ($record) => Storage::url($record->gambar_produk)),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
