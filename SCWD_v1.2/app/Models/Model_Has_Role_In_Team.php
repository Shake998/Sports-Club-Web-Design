<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Has_Role_In_Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_id',
        'role_id',
        'team_id',
    ];

    use HasFactory;
    protected $table = "model_has_role_in_team";


    function equip() {
        return $this->hasOne(Equip::class);
    }

}
