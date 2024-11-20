<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?int $navigationIconSort = 2;

    protected static ?string $navigationgroup = 'Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        TextInput::make('nama_produk')
                        ->label('Product Name')
                        ->required(),

                        MarkdownEditor::make('deskripsi_produk')               
                        ->label('Description')
                        ->required(),

                    ]),

                    Section::make('Images')->schema([
                        FileUpload::make('gambar_produk')
                        ->label('Product Images')
                        ->directory('products-images')
                        ->maxFiles(5)
                        ->reorderable(),
                        
                    ])
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Price')->schema([
                        TextInput::make('harga_produk')
                            ->label('Product Price')
                            ->required()
                            ->type('number')
                            ->minValue(0) // Pastikan bahwa ini sesuai dengan kebutuhan Anda
                            ->maxValue(99999999),
                    ]),
                    Section::make('Stock')->schema([
                        TextInput::make('jumlah_stok')
                            ->label('Total Stock')
                            ->required()
                            ->type('number')
                            ->minValue(0) // Pastikan bahwa ini sesuai dengan kebutuhan Anda
                            ->maxValue(99999999),
                    ]),

                    Section::make('Category')->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->relationship('category', 'name'),
                    ]),

                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('gambar_produk') // Menampilkan gambar
                ->label('Image')
                ->disk('public')
                ->size(50)
                ->url(fn($record) => asset('storage/' . $record->gambar_produk)), 
            Tables\Columns\TextColumn::make('nama_produk')
                ->label('Product Name')
                ->searchable(),
            Tables\Columns\TextColumn::make('category.name')
                ->label('Category')
                ->badge()
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('harga_produk')
                ->label('Price')
                ->money('IDR', locale: 'id')
                ->searchable(),
            Tables\Columns\TextColumn::make('jumlah_stok')
                ->label('Stock')
                ->searchable(),
            Tables\Columns\TextColumn::make('deskripsi_produk')
                ->label('Description')
                ->searchable()
                ->wrap()
                    ->extraAttributes([
                        'style' => 'max-height: 100px; overflow-y: auto; white-space: normal; word-break: break-word; width: 200px;']),

        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
