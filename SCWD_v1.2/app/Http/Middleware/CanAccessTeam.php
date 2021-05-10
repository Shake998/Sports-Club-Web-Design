<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanAccessTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('id_persona', '=', session('LoggedUser'))->first();
        if(!$user){
            return redirect('perfil')->with('fail', 'You must log in');
        }



        return $next($request);
    }
}
