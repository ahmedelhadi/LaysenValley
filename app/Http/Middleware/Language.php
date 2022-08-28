<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App;
use Config;
//use Session;

class Language
{
    public function handle($request, Closure $next)
    {

        if (\Session::has('locale') AND array_key_exists(\Session::get('locale'), Config::get('languages'))) {
            \App::setLocale(\Session::get('locale'));
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            \App::setLocale(\Config::get('app.locale'));
        }

        return $next($request);

    }
}