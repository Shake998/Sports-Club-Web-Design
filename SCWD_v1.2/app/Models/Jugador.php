<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_persona',
        'fitxa',
        'gols',
    ];

    protected $table = "jugador";

    public function juga() {
        return $this->hasMany(Juga::class);
    }




}
