<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Car Rental');
        $this->migrator->add('general.site_email', null);
        $this->migrator->add('general.site_phone', null);
        $this->migrator->add('general.site_whatsapp', null);
        $this->migrator->add('general.site_address', null);
        $this->migrator->add('general.site_google_maps_embed', null);
        $this->migrator->add('general.site_logo_path', null);
        $this->migrator->add('general.site_instagram_url', null);
        $this->migrator->add('general.site_facebook_url', null);
        $this->migrator->add('general.site_tiktok_url', null);
        $this->migrator->add('general.site_youtube_url', null);
        $this->migrator->add('general.site_twitter_url', null);
        $this->migrator->add('general.business_hours', null);
        $this->migrator->add('general.site_favicon', 'favicon.ico');
    }
};
