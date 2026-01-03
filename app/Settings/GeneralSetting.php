<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
    public string $site_name;

    public ?string $site_email;

    public ?string $site_phone;

    public ?string $site_whatsapp;

    public ?string $site_address;

    public ?string $site_google_maps_embed;

    public ?string $site_logo_path;

    public ?string $site_favicon;

    public ?string $site_instagram_url;

    public ?string $site_facebook_url;

    public ?string $site_tiktok_url;

    public ?string $site_youtube_url;

    public ?string $site_twitter_url;

    public ?string $business_hours;

    public static function group(): string
    {
        return 'general';
    }
}
