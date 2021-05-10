<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ZoneNavbar extends Component
{
    public function render()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $data = [
            'LoggedUserInfo'=>$user
        ];
        return view('livewire.zone-navbar', $data);
    }
}
