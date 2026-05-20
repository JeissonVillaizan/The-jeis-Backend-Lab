<?php

use App\Models\Translation;
use Illuminate\Database\QueryException;

if (! function_exists('t')) {
    function t(string $key, ?string $locale = null): string
    {
        static $cache = [];

        $activeLocale = $locale ?? app()->getLocale();

        if (! isset($cache[$activeLocale])) {
            try {
                $cache[$activeLocale] = Translation::query()
                    ->where('locale', $activeLocale)
                    ->pluck('value', 'key')
                    ->all();
            } catch (QueryException $exception) {
                $cache[$activeLocale] = [];
            }
        }

        return $cache[$activeLocale][$key] ?? $key;
    }
}
