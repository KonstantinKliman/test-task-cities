<?php

namespace App\Http\Middleware;

use App\Models\City;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetCity
{
    public function handle(Request $request, Closure $next)
    {
        $citySlug = $request->segment(1);
        $city = City::query()->where('slug', $citySlug)->first();

        if ($city) {
            Session::put('city', $city->slug);
        } elseif (Session::has('city')) {
            return redirect(Session::get('city') . $request->getRequestUri());
        }

        return $next($request);
    }
}
