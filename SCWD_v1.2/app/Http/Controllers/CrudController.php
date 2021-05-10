<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equip;
use App\Models\Partit;
use App\Models\Participa;
use App\Models\Club;

class CrudController extends Controller
{
    
    function updatePartit(Request $request){

        //Validate Request
        $this->validate($request, [
            'update_id' => 'required|integer',
            'update_glocal' => 'required|integer',
            'update_gvisitant' => 'required|integer',
            'update_data' => 'required|date',
        ]);

        //Update DB Partit
        $partitUpdated = Partit::where("id_partit", $request->update_id)
        ->update([
            "gols_local" => $request->update_glocal,
            "gols_visitant" => $request->update_gvisitant,
            "data" => $request->update_data
            ]);

        //Redirect to the team's studies page
        if($partitUpdated) {
            return redirect(url()->previous())->with('success', 'Partit actualitzat correctament');
        } else{
            return redirect(url()->previous())->with('fail', 'No ha sigut possible actualitzar el partit');
        }
    }

    function createPartit(Request $request){
        
        //Validate Request
        $this->validate($request, [
            'create_jornada' => 'required|integer',
            'create_participa_local' => 'required',
            'create_participa_visitant' => 'required|different:create_equip_local',
            'create_data' => 'required|date',
        ]);

        //Create DB Partit
        $partitCreated = new Partit;
        $partitCreated->jornada = $request->create_jornada;
        $partitCreated->id_participa_local = $request->create_participa_local;
        $partitCreated->id_participa_visitant = $request->create_participa_visitant;
        $partitCreated->data = $request->create_data;

        //Get Local Club's image
        $participa_local = Participa::where('id_participa', '=', $request->create_participa_local)
        ->first();
        $equip_local = Equip::where('id_equip', '=', $participa_local->id_equip)
        ->first();
        $club_local = Club::where('id_club', '=', $equip_local->id_club)
        ->first();
        $partitCreated->img_club_local = $club_local->img;

        //Get Visitant Club's image
        $participa_visitant = Participa::where('id_participa', '=', $request->create_participa_visitant)
        ->first();
        $equip_visitant = Equip::where('id_equip', '=', $participa_visitant->id_equip)
        ->first();
        $club_visitant = Club::where('id_club', '=', $equip_visitant->id_club)
        ->first();
        $partitCreated->img_club_visitant = $club_visitant->img;
            

        $partitCreated->save();

        //Redirect to the team's studies page
        if($partitCreated) {
            return redirect(url()->previous())->with('success', 'Partit creat correctament');
        } else{
            return redirect(url()->previous())->with('fail', 'No ha sigut possible crear el partit');
        }
    }

    function deletePartit(Request $request){

        //Validate Request
        $this->validate($request, [
            'delete_id' => 'required|integer',
        ]);

        //Delete DB Partit
        $partitDeleted = Partit::where("id_partit", $request->delete_id)->delete();

        //Redirect to the team's studies page
        if($partitDeleted) {
            return redirect(url()->previous())->with('success', 'Partit eliminat correctament');
        } else{
            return redirect(url()->previous())->with('fail', 'No ha sigut possible eliminar el partit');
        }

    }
}
