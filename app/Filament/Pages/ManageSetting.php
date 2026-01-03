<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSetting;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSetting extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSetting::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->required(),
                TextInput::make('site_email')
                    ->email(),
                TextInput::make('site_phone')
                    ->tel(),
                TextInput::make('site_whatsapp'),
                TextInput::make('site_address'),
                TextInput::make('site_google_maps_embed'),
                TextInput::make('site_logo_path'),
                TextInput::make('site_favicon'),
                TextInput::make('site_instagram_url'),
                TextInput::make('site_facebook_url'),
                TextInput::make('site_tiktok_url'),
                TextInput::make('site_youtube_url'),
                TextInput::make('site_twitter_url'),
                TextInput::make('business_hours'),
            ]);
    }
}
