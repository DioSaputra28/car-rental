<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManageSetting extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSetting::class;

    protected static ?int $navigationSort = 9;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->description('Basic information about your car rental business')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter your site name'),
                        TextInput::make('site_email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('contact@example.com'),
                        Textarea::make('site_address')
                            ->label('Business Address')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Enter your complete business address'),
                        Textarea::make('business_hours')
                            ->label('Business Hours')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('e.g., Monday - Friday: 9:00 AM - 6:00 PM'),
                    ])
                    ->columns(2),

                Section::make('Contact Information')
                    ->description('Contact details for customer communication')
                    ->schema([
                        TextInput::make('site_phone')
                            ->label('Phone Number')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('08 xxx xxxx xxxx'),
                        TextInput::make('site_whatsapp')
                            ->label('WhatsApp Number')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('62 xxx xxxx xxxx')
                            ->helperText('Include country code (e.g., 62)'),
                        TextInput::make('site_google_maps_embed')
                            ->label('Google Maps Embed URL')
                            ->url()
                            ->maxLength(1000)
                            ->placeholder('https://www.google.com/maps/embed?...')
                            ->helperText('Paste the embed URL from Google Maps'),
                    ])
                    ->columns(2),

                Section::make('Branding')
                    ->description('Upload your logo and favicon')
                    ->schema([
                        FileUpload::make('site_logo_path')
                            ->label('Site Logo')
                            ->disk('public')
                            ->directory('branding')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/svg+xml'])
                            ->helperText('Recommended size: 200x50px. Max 2MB. Formats: PNG, JPG, SVG'),
                        FileUpload::make('site_favicon')
                            ->label('Favicon')
                            ->disk('public')
                            ->directory('branding')
                            ->imageEditor()
                            ->maxSize(512)
                            ->acceptedFileTypes(['image/png', 'image/x-png', 'image/x-icon', 'image/vnd.microsoft.icon', 'image/ico'])
                            ->helperText('Recommended size: 32x32px or 16x16px. Max 512KB. Formats: PNG, ICO'),
                    ])
                    ->columns(2),

                Section::make('Social Media')
                    ->description('Your social media profile links')
                    ->schema([
                        TextInput::make('site_instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://instagram.com/yourprofile')
                            ->prefixIcon('heroicon-o-link'),
                        TextInput::make('site_facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://facebook.com/yourpage')
                            ->prefixIcon('heroicon-o-link'),
                        TextInput::make('site_tiktok_url')
                            ->label('TikTok URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://tiktok.com/@yourprofile')
                            ->prefixIcon('heroicon-o-link'),
                        TextInput::make('site_youtube_url')
                            ->label('YouTube URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://youtube.com/@yourchannel')
                            ->prefixIcon('heroicon-o-link'),
                        TextInput::make('site_twitter_url')
                            ->label('Twitter/X URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://twitter.com/yourprofile')
                            ->prefixIcon('heroicon-o-link'),
                    ])
                    ->columns(2),
            ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $settings = app(GeneralSetting::class);

        if (isset($data['site_logo_path'])) {
            $newLogoPath = $data['site_logo_path'];
            $oldLogoPath = $settings->site_logo_path;

            if ($oldLogoPath && $newLogoPath !== $oldLogoPath && Storage::disk('public')->exists($oldLogoPath)) {
                Storage::disk('public')->delete($oldLogoPath);
            }
        } elseif ($settings->site_logo_path) {
            if (Storage::disk('public')->exists($settings->site_logo_path)) {
                Storage::disk('public')->delete($settings->site_logo_path);
            }
        }
        if (isset($data['site_favicon'])) {
            $newFaviconPath = $data['site_favicon'];
            $oldFaviconPath = $settings->site_favicon;

            if ($oldFaviconPath && $newFaviconPath !== $oldFaviconPath && Storage::disk('public')->exists($oldFaviconPath)) {
                Storage::disk('public')->delete($oldFaviconPath);
            }
        } elseif ($settings->site_favicon) {
            if (Storage::disk('public')->exists($settings->site_favicon)) {
                Storage::disk('public')->delete($settings->site_favicon);
            }
        }

        return $data;
    }
}
