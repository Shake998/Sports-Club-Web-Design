<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juga extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_jugador',
        'id_equip',
        'dorsal',
        'nom_dorsal',
        'data_inici',
        'data_inici',
        'img'
    ];

    protected $table = "juga";

    public function jugador() {
        return $this->belongsTo(Jugador::class);
    }
}
