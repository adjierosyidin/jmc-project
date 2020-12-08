<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Carbon\Carbon;

class UserActivationCheck
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
        
        $expired = User::where('username', Auth::user()->username)
        ->where('activated', '=', 'no')
        ->where('created_at', '<', Carbon::now()->subDays(5))->get();

        if(!$expired->isEmpty()){
            Auth::logout();
            $expired->each->delete();
            return redirect()->route('register')->with('error','Akun anda telah expired, silahkan lakukan pendaftaran ulang.');;
        } else {
            return $next($request);
        }
    }
}
