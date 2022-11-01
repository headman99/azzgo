<?php

namespace App\Http\Middleware;

use App\Exceptions\UnverifiedEmailException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(empty(Auth::user()->email_verified_at)){
          throw new UnverifiedEmailException('Verifica la tua mail per continuare');
        }
        return $next($request);
    }
}
