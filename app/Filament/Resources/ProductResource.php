<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\ProductResource\RelationManagers\GroupItemsRelationManager;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Select::make('product_category_id')
                                    ->required()
                                    ->label('Category')
                                    ->options(function () {
                                        return ProductCategory::all()
                                            ->pluck('title', 'id');
                                    }),

                                Select::make('product_id')
                                    ->label('Group')
                                    ->options(function (?Model $record) {
                                        return Product::all()
                                            ->where('id', '<>', $record?->id)
                                            ->where('is_group', '=', true)
                                            ->pluck('title', 'id');
                                    }),

                                TextInput::make('title')
                                    ->required(),

                                TextInput::make('slug')
                                    ->disabled(),

                                RichEditor::make('description')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('attachments')
                                    ->fileAttachmentsVisibility('private'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Section::make('Settings')
                    ->schema([
                        FileUpload::make('main_image')
                            ->disk('products')
                            ->directory(function (?Model $record) {
                                return (int) floor($record->id / 1000);
                            })
                            ->image()
                            ->disableLabel(),

                        TextInput::make('price')
                            ->numeric()
                            ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                            ->required()
                            ->minValue(0)
                            ->maxValue(999999.99),

                        Toggle::make('is_stockable')
                            ->default(true),

                        TextInput::make('in_stock')
                            ->required()
                            ->integer()
                            ->default(0),

                        Toggle::make('is_group')
                            ->default(false),

                        Toggle::make('is_subscribe')
                            ->default(false),

                        Toggle::make('is_active')
                            ->default(true),

                        TextInput::make('position')
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
                TextColumn::make('category.title')
                    ->label('Category'),

                TextColumn::make('group.title')
                    ->label('Group'),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('main_image')
                    ->disk('products'),

                TextColumn::make('price'),

                ToggleColumn::make('is_active')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
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
        return parent::getGlobalSearchEloquentQuery()
            ->with(['category', 'group'])
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
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
