<?php

namespace App\Filament\Resources\Galeries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GaleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                    ->label('Image')
                    ->required()
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('gallery'),
                Toggle::make('is_featured')
                    ->label('Featured')
                    ->default(false),
            ]);
    }
}
