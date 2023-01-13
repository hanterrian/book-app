<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Models\ProductCategory;
use Filament\Forms\Components\Builder;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $slug = 'pages';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->disabled()
                                    ->required()
                                    ->unique(Page::class, 'slug', fn ($record) => $record),

                                Builder::make('content')
                                    ->required()
                                    ->blocks([
                                        Builder\Block::make('heading')
                                            ->schema([
                                                TextInput::make('content')
                                                    ->label('Heading')
                                                    ->required(),
                                                Select::make('level')
                                                    ->options([
                                                        'h1' => 'Heading 1',
                                                        'h2' => 'Heading 2',
                                                        'h3' => 'Heading 3',
                                                        'h4' => 'Heading 4',
                                                        'h5' => 'Heading 5',
                                                        'h6' => 'Heading 6',
                                                    ])
                                                    ->required(),
                                            ]),
                                        Builder\Block::make('paragraph')
                                            ->schema([
                                                RichEditor::make('content')
                                                    ->fileAttachmentsDisk('public')
                                                    ->fileAttachmentsDirectory('builder')
                                                    ->fileAttachmentsVisibility('private'),
                                            ]),
                                        Builder\Block::make('image')
                                            ->schema([
                                                FileUpload::make('url')
                                                    ->disk('public')
                                                    ->directory(function (?Model $record) {
                                                        $id = $record == null ? getNextId(Page::class) : $record->id;

                                                        $sub = (int) floor($id / 1000);

                                                        return "builder".DIRECTORY_SEPARATOR."{$sub}";
                                                    })
                                                    ->getUploadedFileNameForStorageUsing(function (?Model $record, TemporaryUploadedFile $file): string {
                                                        $id = $record == null ? getNextId(Page::class) : $record->id;

                                                        return 'block-'.$id.'.'.$file->getClientOriginalExtension();
                                                    })
                                                    ->visibility('private')
                                                    ->label('Image')
                                                    ->image(),

                                                TextInput::make('alt')
                                                    ->label('Alt text')
                                                    ->required(),
                                            ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Section::make('Settings')
                    ->schema([
                        Toggle::make('is_active')
                            ->default(true),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
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

                ToggleColumn::make('is_active')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    protected static function getGlobalSearchEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getGlobalSearchEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug'];
    }
}
