<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Grid::make()
                    ->columns(1)
                    ->columnSpan(2)
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', \Illuminate\Support\Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('Main Image')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('cars/main')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->default(null)
                            ->columnSpanFull(),
                        Toggle::make('is_featured')
                            ->required(),
                    ]),
                Grid::make()
                    ->columns(1)
                    ->columnSpan(2)
                    ->components([
                        Section::make('Car Images')
                            ->components([
                                Repeater::make('images')
                                    ->label('Car Images')
                                    ->relationship('images')
                                    ->schema([
                                        FileUpload::make('path')
                                            ->label('Image')
                                            ->required()
                                            ->image()
                                            ->imageEditor()
                                            ->disk('public')
                                            ->visibility('public')
                                            ->directory('cars')
                                            ->columnSpanFull(),

                                        Toggle::make('is_featured')
                                            ->label('Featured')
                                            ->default(false)
                                            ->columnSpan(1),

                                        Toggle::make('is_galery')
                                            ->label('Show in Gallery')
                                            ->default(true)
                                            ->columnSpan(1),
                                    ])
                                    ->columns(2)
                                    ->grid(3)
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(
                                        fn(array $state): ?string =>
                                        $state['path'] ? basename($state['path']) : 'New Image'
                                    )
                                    ->addActionLabel('Add Image')
                                    ->defaultItems(0)
                            ])
                    ])
            ]);
    }
}
