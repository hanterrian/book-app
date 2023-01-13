<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeaderBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('header')
            ->schema([
                Select::make('type')
                    ->options([
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ]),
                TextInput::make('title'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
