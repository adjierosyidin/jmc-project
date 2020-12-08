<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode(':', $role);

        foreach($roles as $role) {
            if($request->user()->role()->where('nm_role', $role)->exists()) {
                return $next($request);
            }
        }

        $request->session()->flash('error', 'Unauthorized!');
        return redirect('dashboard');
    }
}
