<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminLoggedInOrNot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //return "loginfirst";
       // if(Auth::()){
            return $next($request);
        //}
        //return redirect()->route("admin1.login");
        //return redirect()->route("admin.login")->with("error_message","You must login first.");
    }
}
