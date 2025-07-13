<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JobProviderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (Auth::check()) {
            $user = auth()->user();

            // dd($user);

            if ($user->user_type == 'job_provider' && $user->is_provider == 1) {
                return $next($request);
            }
        }

        $notify[] = ['error', __('Please wait for admin approval')];

        return to_route('user.login')->withNotify($notify);

    }
}
