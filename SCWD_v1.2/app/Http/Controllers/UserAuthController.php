<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    function login(){
        //Go to view Login
        return view('auth.login');
    }

    function logout(){
        //Check if User is logged
        if(session()->has('LoggedUser')){
            //Logout User and return to Login page
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    function profile(){
        //Check if User is logged and get info
        if (session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $jugador = $user
            ->join('persona', 'user_id', 'id')
            ->join('jugador', 'jugador.id_persona', 'persona.id_persona')
            ->select('jugador.*')
            ->first();

            //Compact data sent to view
            $data = [
                'User'=>$user,
                'Jugador'=>$jugador
            ];
        }
        return view('zone.perfil', $data);
    }

    function check(Request $request){
        //Validate Requests
        $request->validate([
            'username' => 'required|min:6|max:8',
            'password' => 'required'
        ]);
        
        //If form is validated successfuly, then login user
        $user = User::where('username', '=', $request->username)->first();
        
        if($user){
            if(Hash::check($request->password, $user->password)){
                //If password and email correct, then redirect user to profile
                $request->session()->put('LoggedUser', $user->id);
                return redirect('perfil');
            }else{
                return back()->with('fail', 'Username  or password incorrect!');
            }
        }else{
            return back()->with('fail', 'Username or password incorrect!');
        }
    }
}
