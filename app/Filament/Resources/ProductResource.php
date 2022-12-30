<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\ProductResource\RelationManagers\GroupItemsRelationManager;
use App\Models\Product;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'products';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_category_id')
                    ->required()
                    ->integer(),

                TextInput::make('product_id')
                    ->integer(),

                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(Product::class, 'slug', fn ($record) => $record),

                TextInput::make('description'),

                TextInput::make('price')
                    ->numeric(),

                TextInput::make('is_stockable')
                    ->required()
                    ->integer(),

                TextInput::make('in_stock')
                    ->required()
                    ->integer(),

                TextInput::make('is_group')
                    ->required()
                    ->integer(),

                TextInput::make('is_subscribe')
                    ->required()
                    ->integer(),

                TextInput::make('is_active')
                    ->required()
                    ->integer(),

                TextInput::make('position')
                    ->required()
                    ->integer(),

                TextInput::make('deleted_at'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?Product $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?Product $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_category_id'),

                TextColumn::make('product_id'),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('main_image'),

                TextColumn::make('description'),

                TextColumn::make('price'),

                TextColumn::make('is_stockable'),

                TextColumn::make('in_stock'),

                TextColumn::make('is_group'),

                TextColumn::make('is_subscribe'),

                TextColumn::make('is_active'),

                TextColumn::make('position'),

                TextColumn::make('deleted_at'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
            GroupItemsRelationManager::class,
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

    protected static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category', 'group']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'category.title', 'group.title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->category) {
            $details['Category'] = $record->category->title;
        }

        if ($record->group) {
            $details['Group'] = $record->group->title;
        }

        return $details;
    }
}
