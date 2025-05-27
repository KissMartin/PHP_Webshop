<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsNotAdmin
{
public function handle(Request $request, Closure $next)
{
    if ($request->user() && $request->user()->is_admin) {
        return redirect()->back();
    }

    return $next($request);
}

}
