<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveUserMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle( Request $request, Closure $next ): Response {
        $user = $request->user();
        if ( $user && $user !== User::STATUS_ACTIVE ) {
            abort( 403, 'Your account is not active. Please contact support.' );
        }
        return $next( $request );
    }
}
