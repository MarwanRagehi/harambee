<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    protected array $availableLocales = ['en', 'ar'];

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->get('lang');

        if ($locale && in_array($locale, $this->availableLocales, true)) {
            session(['app_locale' => $locale]);
        }

        $sessionLocale = session('app_locale');
        if (! $sessionLocale || ! in_array($sessionLocale, $this->availableLocales, true)) {
            $sessionLocale = config('app.locale');
        }

        app()->setLocale($sessionLocale);

        view()->share('currentLocale', $sessionLocale);
        view()->share('availableLocales', [
            'en' => ['label' => 'English', 'native' => 'English'],
            'ar' => ['label' => 'Arabic', 'native' => 'العربية'],
        ]);

        return $next($request);
    }
}
