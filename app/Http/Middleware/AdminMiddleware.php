<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {


        // 1: checkSession
        if (env('APP_PAYMENT') != 'local') {

            return $next($request);

        } // end if





        // ------------------------------------------------
        // ------------------------------------------------



        if (session('hasUserAccess')) {

            return $next($request);

        } else {

            abort(404);

        } // end if



    } // end function


} // end class
