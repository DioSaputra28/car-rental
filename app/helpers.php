<?php

use App\Settings\GeneralSetting;
use Spatie\LaravelSettings\Settings;

if (!function_exists('settings')) {
    /**
     * Get instance of Settings class.
     *
     * @template T of Settings
     * @param class-string<T>|T|null $setting
     * @return T
     */
    function settings(Settings|string|null $setting = null): Settings
    {
        if (is_null($setting)) {
            return app(GeneralSetting::class);
        }

        if (is_string($setting)) {
            $resolved = app($setting);
        } else {
            $resolved = $setting;
        }

        if (!$resolved instanceof Settings) {
            throw new InvalidArgumentException("Provided value is not a valid Settings class.");
        }

        return $resolved;
    }
}

if (!function_exists('get_site_name')) {
    /**
     * Get site name from settings.
     *
     * @return string
     */
    function get_site_name(): string
    {
        return settings()->site_name ?? config('app.name', 'Car Rental');
    }
}

if (!function_exists('get_site_email')) {
    /**
     * Get site email from settings.
     *
     * @return string|null
     */
    function get_site_email(): ?string
    {
        return settings()->site_email;
    }
}

if (!function_exists('get_site_phone')) {
    /**
     * Get site phone from settings.
     *
     * @return string|null
     */
    function get_site_phone(): ?string
    {
        return settings()->site_phone;
    }
}

if (!function_exists('get_site_whatsapp')) {
    /**
     * Get site WhatsApp from settings.
     *
     * @return string|null
     */
    function get_site_whatsapp(): ?string
    {
        return settings()->site_whatsapp;
    }
}

if (!function_exists('get_site_address')) {
    /**
     * Get site address from settings.
     *
     * @return string|null
     */
    function get_site_address(): ?string
    {
        return settings()->site_address;
    }
}

if (!function_exists('get_site_logo_url')) {
    /**
     * Get site logo URL from settings.
     *
     * @return string|null
     */
    function get_site_logo_url(): ?string
    {
        $logoPath = settings()->site_logo_path;

        if (empty($logoPath)) {
            return null;
        }

        return asset('storage/' . $logoPath);
    }
}

if (!function_exists('get_site_favicon_url')) {
    /**
     * Get site favicon URL from settings.
     *
     * @return string
     */
    function get_site_favicon_url(): string
    {
        $favicon = settings()->site_favicon;

        if (empty($favicon)) {
            return asset('favicon.ico');
        }

        // If it's just 'favicon.ico', return from public root
        if ($favicon === 'favicon.ico') {
            return asset('favicon.ico');
        }

        // Otherwise, assume it's in storage
        return asset('storage/' . $favicon);
    }
}

if (!function_exists('get_business_hours')) {
    /**
     * Get business hours from settings.
     *
     * @return string|null
     */
    function get_business_hours(): ?string
    {
        return settings()->business_hours;
    }
}

if (!function_exists('get_social_media')) {
    /**
     * Get social media URLs from settings.
     *
     * @return array
     */
    function get_social_media(): array
    {
        return [
            'instagram' => settings()->site_instagram_url,
            'facebook' => settings()->site_facebook_url,
            'tiktok' => settings()->site_tiktok_url,
            'youtube' => settings()->site_youtube_url,
            'twitter' => settings()->site_twitter_url,
        ];
    }
}
