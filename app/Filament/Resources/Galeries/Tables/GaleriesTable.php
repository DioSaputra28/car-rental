<?php

namespace App\Filament\Resources\Galeries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class GaleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                    ->label('Image')
                    ->disk('public')
                    ->size(150)
                    ->searchable(),
                ToggleColumn::make('is_featured')
                    ->label('Featured'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->modalHeading('Gallery Image')
                    ->modalWidth(Width::ExtraLarge)
                    ->form([
                        FileUpload::make('path')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->disabled(),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->disabled(),
                    ]),
                EditAction::make()
                    ->modalHeading('Edit Gallery Image')
                    ->form([
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
                    ]),
            ])
            ->recordUrl(null)
            ->recordAction('view')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
