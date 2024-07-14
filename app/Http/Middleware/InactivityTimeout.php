<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InactivityTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $timeout = 900; // Timeout in seconds (15 minutes)

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');

            if ($lastActivity && (time() - $lastActivity > $this->timeout)) {
                // Save necessary session data before logging out
                session(['preserve_data' => session('voter_id')]);

                Auth::logout();
                // return redirect()->route('lockscreen');
                return redirect(url('/lockscreen'));
            }

            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
