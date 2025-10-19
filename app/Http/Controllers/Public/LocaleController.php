<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class LocaleController extends Controller
{
    protected array $locales = ['en', 'ar'];

    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, $this->locales, true)) {
            session(['app_locale' => $locale]);
        }

        $previous = URL::previous() ?: route('home');

        return Redirect::to($previous);
    }
}
