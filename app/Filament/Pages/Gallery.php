<?php

namespace App\Filament\Pages;

use App\Models\Galery;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\Action as FormAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Gallery extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected string $view = 'filament.pages.gallery';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $title = 'Gallery Management';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'images' => Galery::orderBy('created_at', 'desc')->get()->toArray(),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Repeater::make('images')
                    ->label('Gallery Images')
                    ->schema([
                        FileUpload::make('path')
                            ->label('Image')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('gallery')
                            ->columnSpanFull(),

                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                    ])
                    ->columns(1)
                    ->grid(3)
                    ->reorderable()
                    ->collapsible()
                    ->itemLabel(
                        fn(array $state): ?string =>
                        $state['path'] ? basename($state['path']) : 'New Image'
                    )
                    ->addable(false)
                    ->defaultItems(0)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('addImage')
                ->label('Add Image')
                ->icon('heroicon-o-plus')
                ->color('primary')
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
                ])
                ->action(function (array $data) {
                    Galery::create([
                        'path' => $data['path'],
                        'is_featured' => $data['is_featured'] ?? false,
                    ]);

                    Notification::make()
                        ->title('Image added successfully')
                        ->success()
                        ->send();

                    $this->mount();
                }),
            Action::make('save')
                ->label('Save Changes')
                ->action('save')
                ->color('success')
                ->icon('heroicon-o-check'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $existingIds = collect($data['images'] ?? [])
            ->pluck('id')
            ->filter()
            ->toArray();

        Galery::whereNotIn('id', $existingIds)->delete();

        foreach ($data['images'] ?? [] as $imageData) {
            if (isset($imageData['id'])) {
                $image = Galery::find($imageData['id']);
                if ($image) {
                    $image->update([
                        'path' => $imageData['path'],
                        'is_featured' => $imageData['is_featured'] ?? false,
                    ]);
                }
            } else {
                Galery::create([
                    'path' => $imageData['path'],
                    'is_featured' => $imageData['is_featured'] ?? false,
                ]);
            }
        }

        Notification::make()
            ->title('Gallery updated successfully')
            ->success()
            ->send();

        $this->mount();
    }
}
