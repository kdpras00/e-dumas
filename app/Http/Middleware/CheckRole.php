<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        // Map role names on middleware to IDs
        // 1: Masyarakat
        // 2: Petugas
        // 3: Admin
        // 4: Kepala Kelurahan
        
        $roleMap = [
            'Masyarakat' => 1,
            'Petugas' => 2,
            'Admin' => 3,
            'Kepala' => 4
        ];

        foreach ($roles as $role) {
            if (isset($roleMap[$role]) && $user->user_level_id == $roleMap[$role]) {
                return $next($request);
            }
        }

        return abort(403, 'Unauthorized action.');
    }
}
