<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{
    use HasFactory;
    protected $table = "participa";

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    
}
