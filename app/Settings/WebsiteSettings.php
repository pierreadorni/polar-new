<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class WebsiteSettings extends Settings
{
    public string $headerMessage;
    public string $aboutText;
    public static function group(): string
    {
        return 'website';
    }
}
