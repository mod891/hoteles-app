<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return route('landingPage');
      //  return $request->expectsJson() ? null : route('login');
    }
/*
    public function handle($request, Closure $next)
{
    //check here if the user is authenticated
    if ( ! $this->auth->user() )
    {
        return redirect()->to('landingPage');// here you should redirect to login 
    }

    return $next($request);
}
*/
}
