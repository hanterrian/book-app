<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentCurator\Forms\Components\MediaPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Select::make('product_category_id')
                                    ->required()
                                    ->label('Category')
                                    ->options(function () {
                                        return ProductCategory::all()
                                            ->pluck('title', 'id');
                                    }),

                                Forms\Components\Select::make('product_id')
                                    ->label('Group')
                                    ->options(function (?Model $record) {
                                        return Product::all()
                                            ->where('id', '<>', $record?->id)
                                            ->where('is_group', '=', true)
                                            ->pluck('title', 'id');
                                    }),

                                Forms\Components\TextInput::make('title')
                                    ->required(),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled(),

                                Forms\Components\MarkdownEditor::make('description'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        MediaPicker::make('main_image')
                            ->disk('products')
                            ->disableLabel(),

                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                            ->required()
                            ->minValue(0)
                            ->maxValue(999999.99),

                        Forms\Components\Toggle::make('is_stockable')
                            ->default(true),

                        Forms\Components\TextInput::make('in_stock')
                            ->required()
                            ->integer()
                            ->default(0),

                        Forms\Components\Toggle::make('is_group')
                            ->default(false),

                        Forms\Components\Toggle::make('is_subscribe')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        Forms\Components\Toggle::make('searchable')
                            ->label('Searchable')
                            ->default(true),

                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->integer()
                            ->default(0),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\IconColumn::make('searchable')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
