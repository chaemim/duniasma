<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = \App\User::where('email', $request->email)->first();
        if ($user->role == '1') {
            return redirect('profil');
        } elseif ($user->role == '2') {
            return redirect('admin/dashboard');
        }

        return $next($request);
    }
}
