<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AlreadyLoggedIn
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
        if(session()->has('LoggedUser') && url('login') == $request->url()){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            return redirect('perfil')->with($data);
        }
        return $next($request);
    }
}
