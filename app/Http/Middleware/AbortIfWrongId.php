<?php

namespace App\Http\Middleware;

use App\Models\Todos;
use Closure;
use Illuminate\Support\Facades\Auth;

class AbortIfWrongId
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $parameter = $request->route()->parameter('id');

        if (
            $parameter &&
            !(Todos::where('user', Auth::id())->find($parameter))
        ) {
            abort(404);
        }

        return $next($request);
    }
}
