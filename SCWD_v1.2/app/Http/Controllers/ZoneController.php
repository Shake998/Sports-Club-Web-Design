<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Juga;
use App\Models\Persona;
use App\Models\Equip;
use App\Models\Partit;
use App\Models\Model_Has_Role_In_Team;
use App\Models\Participa;
use App\Models\Categoria;
use App\Models\Grup;
use App\Models\Club;
use App\Models\Role;
use App\Models\Campionat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{
    //Public functions
    function studies($id_equip){

        //Get current User and Persona
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $persona = $user->persona;

        //Arrays of Teams and Clubs that participate in the current Campionat / Categoria / Grup
        $equipsRanking = [];
        $clubsRanking = [];
        
        //Check if User has Role in Team
        $userHasRoleInTeam = Model_Has_Role_In_Team::where([
            ['model_id', '=', $persona->id_persona],
            ['team_id', '=', $id_equip],
        ])
        ->get();
        //If user has no Role in Team redirect with error
        if($userHasRoleInTeam->isEmpty()){
            return redirect('equips')->with('fail', 'Current User has no Role in this Team!');
        }

        //Get info of current Team
        $equip = Equip::where('id_equip', '=', $id_equip)
        ->first();

        //Get info of current Perticipa
        $year = Carbon::now()->format('Y');
        //TODO - POSSIBILITY OF BEING IN THE FIRST YEAR OF THE SEASON
        $participacio = Participa::where([
            ['id_equip', '=', $id_equip],
            ['data_inici', '>=', intval($year)-1],
            ['data_final', '<=', intval($year)]
        ])
        ->first();

        //Get info of current Campionat
        $campionat = Campionat::where('id_campionat', '=', $participacio->id_campionat)
        ->first();

        //Get info of current Categoria
        $categoria = Categoria::where('id_categoria', '=', $participacio->id_categoria)
        ->first();

        //Get info of current Grup
        $grup = Grup::where('id_grup', '=', $participacio->id_grup)
        ->first();

        //Get Role in Team
        $role = Role::find($userHasRoleInTeam[0]->role_id);
        
        //Get Plantilla of Participa
        $plantilla = $this->getPlantilla($id_equip);

        //Get All Matches vs Participa
        $partits = $this->getMatches($participacio->id_participa);
        
        //Get Participacions for ranking of current Campionat
        $participacionsRanking = Participa::where([
            ['id_campionat', '=', $participacio->id_campionat],
            ['id_categoria', '=', $participacio->id_categoria],
            ['id_grup', '=', $participacio->id_grup]
        ])
        ->orderByDesc('puntuacio')
        ->get();


        //Get Equips for ranking of current Campionat
        foreach($participacionsRanking as $index=>$participacioRanking) {
            $equipRankingToPush = Equip::where([
                ['id_equip', '=', $participacioRanking->id_equip]
            ])
            ->first();
            $equipsRanking[] = $equipRankingToPush;
        }
        
        //Get Clubs for ranking of current Campionat
        foreach($equipsRanking as $index=>$equipRanking) {
            $clubRankingToPush = Club::where([
                ['id_club', '=', $equipRanking->id_club]
            ])
            ->first();
            $clubsRanking[] = $clubRankingToPush;
        }

        //Compact data sent to view
        $data = [
            'User'=>$user,
            'Equip'=>$equip,
            'Participacio'=>$participacio,
            'Categoria'=>$categoria,
            'Grup'=>$grup,
            'Role'=>$role,
            'Plantilla'=>$plantilla,
            'Partits'=>$partits,
            'ParticipacionsRanking'=>$participacionsRanking,
            'EquipsRanking'=>$equipsRanking,
            'ClubsRanking'=>$clubsRanking
        ];
        return view('zone.estudis', $data);
    }

    function equips(){
        //Get current User and Persona
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $persona = $user->persona;

        //Arrays of Teams and where those participate, with extra tables info
        $teams = [];
        $participacions = [];
        $categories = [];
        $groups = [];

        //Get Roles in Teams of the User
        $roleInTeam = Model_Has_Role_In_Team::where([
            ['model_id', '=', $persona->id_persona]/*,
            ['role_id', '=', 2],*/
        ])
        ->get();

        //Get Teams where User have a Role
        foreach($roleInTeam as $index=>$team) {
            $teamToPush = Equip::select('id_equip')
            ->where('id_equip', '=', $roleInTeam[$index]->team_id)
            ->value('id_equip');
            $teams[] = $teamToPush;
        }

        //Get Participations of each Team
        $year = Carbon::now()->format('Y');
        foreach($teams as $index=>$participacio) {
            //TODO - POSSIBILITY OF BEING IN THE FIRST YEAR OF THE SEASON
            $participacioToPush = Participa::where([
                ['id_equip', '=', $participacio],
                ['data_inici', '>=', intval($year)-1],
                ['data_final', '<=', intval($year)]
            ])
            ->first();
            
            $participacions[] = $participacioToPush;
        }

        //Get Category of the Participation
        foreach ($participacions as $index=>$categoria){
            $categoriaToPush = Categoria::select('nom')
                ->where('id_categoria', '=', $categoria->id_categoria)
                ->value('nom');

            $categories[] = $categoriaToPush;
        }

        //Get Group of the participation
        foreach ($participacions as $index=>$grup){
            $grupToPush = Grup::select('nom')
                ->where('id_grup', '=', $grup->id_grup)
                ->value('nom');

            $groups[] = $grupToPush;
        }

        //TODO - Get Role names in Teams

        //Compact data sent to view
        $data = [
            'User'=>$user,
            'Persona'=>$persona,
            'RoleInTeam'=>$roleInTeam,
            'Teams'=>$teams,
            'Participacions'=>$participacions,
            'Categories'=>$categories,
            'Groups'=>$groups
        ];
        return view('zone.equips', $data);
    }

    //Private Functions
    private function getPlantilla($id_equip){
        //Get all Juga in Team - TODO - Check year of Juga & OderBy dorsal. Edit: Might not be necessary if controlled by Temporada in Participa
        $plantilla = Juga::where('id_equip', '=', $id_equip)
        ->get();
        
        return $plantilla;
    }

    private function getMatches($id_participa){
        //Get all Partit where Equip participa
        $partits = Partit::where('id_participa_local', '=', $id_participa)
        ->orWhere('id_participa_visitant', '=', $id_participa)
        ->get();

        return $partits;
    }
}
