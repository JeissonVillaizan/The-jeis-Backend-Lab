<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function update(string $locale): RedirectResponse
    {
        if (! in_array($locale, ['en', 'es'], true)) {
            $locale = 'en';
        }

        session(['locale' => $locale]);

        return back();
    }
}
