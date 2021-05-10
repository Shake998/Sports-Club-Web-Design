<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    
    protected $table = "persona";

    
    public function jugador() {
        return $this->hasOne(Jugador::class);
    }



}
