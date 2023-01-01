<?php

namespace App\Filament\Resources\ProductCategoryResource\RelationManagers;

use App\Models\ProductCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_category_id')
                    ->label('Parent product')
                    ->options(ProductCategory::all()->pluck('title', 'id')),

                TextInput::make('title')
                    ->required(),

                TextInput::make('slug')
                    ->disabled(),

                FileUpload::make('image')
                    ->disk('categories')
                    ->image()
                    ->disableLabel(),

                TextInput::make('is_active')
                    ->required()
                    ->integer()
                    ->default(true),

                TextInput::make('position')
                    ->required()
                    ->integer()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->disk('categories'),

                ToggleColumn::make('is_active')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position')
                    ->searchable()
                    ->sortable(),
            ]);
    }
}
