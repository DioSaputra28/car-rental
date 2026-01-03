<?php

namespace App\Filament\Resources\Galeries\Pages;

use App\Filament\Resources\Galeries\GaleryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;

class ListGaleries extends ListRecords
{
    protected static string $resource = GaleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalHeading('New Gallery Image')
                ->form([
                    \Filament\Forms\Components\FileUpload::make('path')
                        ->label('Image')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('gallery'),
                    \Filament\Forms\Components\Toggle::make('is_featured')
                        ->label('Featured')
                        ->default(false),
                ]),
        ];
    }
}
