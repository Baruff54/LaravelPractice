<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Auth;
 
class IsAdmin {
    public function handle($request, Closure $next) {
        if(!empty(Auth::user()) && Auth::user()->isAdmin) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}