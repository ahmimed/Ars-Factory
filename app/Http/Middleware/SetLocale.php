<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (! in_array($locale, ['fr', 'en'], true)) {
            $locale = session('locale', config('app.locale', 'fr'));
        }

        App::setLocale($locale);
        session(['locale' => $locale]);
        View::share('currentLocale', $locale);

        return $next($request);
    }
}