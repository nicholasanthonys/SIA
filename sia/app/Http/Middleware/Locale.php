<?php
namespace App\Http\Middleware ;

use Closure ;
use Illuminate\Http\Request ;
use Illuminate\Foundation\Application ;
use Illuminate\Support\Facades\Config ;
use Illuminate\Support\Facades\Session ;

class Locale
{
    public function handle($req, Closure $next)
    {
        if (Session :: has('app_locale')) {
            \App :: setLocale(Session :: get('app_locale'));
        } else {
            \App :: setLocale(Config :: get('app.fallback_locale'));
        }
        return $next($req);
    }
}
