<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Detectamos el idioma del navegador eligiendo entre los que soportas
        $browserLanguage = $request->getPreferredLanguage(['en', 'es']);

        // Buscamos en la sesión. Si no hay nada guardado, usamos el del navegador
        $locale = $request->session()->get('locale', $browserLanguage);

        if (!in_array($locale, ['en', 'es'], true)) {
            $locale = 'en';
        }

        app()->setLocale($locale);
        View::share('currentLocale', $locale);

        return $next($request);
    }
}