<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use FilamentCurator\Forms\Components\MediaPicker;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ImageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('image')
            ->schema([
                MediaPicker::make('image')
                    ->directory('blocks')
                    ->disableLabel(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
