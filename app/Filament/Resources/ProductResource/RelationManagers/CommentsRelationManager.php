<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\ProductComment;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('product_id')
                    ->relationship('product', 'title')
                    ->searchable()
                    ->required(),

                TextInput::make('product_comment_id')
                    ->required()
                    ->integer(),

                TextInput::make('comment')
                    ->required(),

                TextInput::make('attachment'),

                TextInput::make('is_active')
                    ->required()
                    ->integer(),

                TextInput::make('deleted_at'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?ProductComment $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?ProductComment $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('product.title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('product_comment_id'),

                TextColumn::make('comment'),

                TextColumn::make('attachment'),

                TextColumn::make('is_active'),

                TextColumn::make('deleted_at'),
            ]);
    }
}
