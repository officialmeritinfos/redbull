<?php

use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Context;


if (! function_exists('setting')) {
    /**
     * Retrieve a global platform setting by column name.
     *
     * @param  string  $key      Column name in the general_settings table
     * @param  mixed   $default  Value to return if column is missing or null
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        static $settings;

        if (!$settings) {
            // Cache the first row as an associative array
            $settings = Cache::remember('general_settings_cache', 300, function () {
                return optional(GeneralSetting::first())->toArray() ?? [];
            });
        }

        return $settings[$key] ?? $default;
    }
}
