<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    protected array $supported = ['en', 'fr', 'es'];

    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');

        // If no session locale but user is logged in, try their stored lang
        if (! $locale && session('auth_uid')) {
            $locale = session('user_lang');
        }

        if (! $locale || ! in_array($locale, $this->supported, true)) {
            $locale = config('app.locale', 'en');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
