<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManajemenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('email', Auth::user()->email)->first();

        if (($user->role == 'admin' || $user->role == 'guru') && $user->status == 1) {
            return $next($request);
        }

        if ($user->role == 'murid') {
            return redirect()->route('learning');
        }

        // Destroy Session
        Auth::logout();

        return redirect()
            ->route('landing')
            ->with(['error' => 'Anda tidak punya akses ke halaman tersebut!']);
    }
}
