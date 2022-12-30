<?php

namespace App\Filament\Resources\ProductCategoryResource\RelationManagers;

use App\Models\ProductCategory;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_category_id')
                    ->integer(),

                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(ProductCategory::class, 'slug', fn ($record) => $record),

                TextInput::make('is_active')
                    ->required()
                    ->integer(),

                TextInput::make('position')
                    ->required()
                    ->integer(),

                TextInput::make('deleted_at'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?ProductCategory $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?ProductCategory $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_category_id'),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image'),

                TextColumn::make('is_active'),

                TextColumn::make('position'),

                TextColumn::make('deleted_at'),
            ]);
    }
}
