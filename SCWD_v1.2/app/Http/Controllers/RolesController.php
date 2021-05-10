<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Juga;
use App\Models\Model_Has_Role_In_Team;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RolesController extends Controller
{
    //Test functions to create test data in DB
    function createRolesPermissionsTable() {
        $user = new User();
        $user->nom = 'abse';
        $user->username = 'abs';
        $user->password = Hash::make('12345');
        $user->correu = 'useremail@something.com';
        $user->save();

        $user->assignRole('staffTecnic');
        return redirect('perfil');
    }
    function createRolesPermissions() {
        //Create Roles
        $role = Role::create(['name' => 'staffFisic']);
        $role = Role::create(['name' => 'staffTecnic']);
        $role = Role::create(['name' => 'staffDelegat']);
        $role = Role::create(['name' => 'jugador']);

        //Create Permissions
        $permission = Permission::create(['name' => 'crudInfoFisica']);
        $permission = Permission::create(['name' => 'readInfoFisica']);
        $permission = Permission::create(['name' => 'crudInfoTecnica']);
        $permission = Permission::create(['name' => 'readInfoTecnica']);
        $permission = Permission::create(['name' => 'crudInfoEquip']);
        $permission = Permission::create(['name' => 'readInfoEquip']);
        $permission = Permission::create(['name' => 'crudInfoPersonal']);
        $permission = Permission::create(['name' => 'readInfoPersonal']);
    }

    function assignRolesPermissions() {
        
        //Give Permissions to Roles
        
        //Staff Fisic
        $role = Role::findByName('staffFisic');
        $role->givePermissionTo('crudInfoFisica');
        $role->givePermissionTo('readInfoTecnica');
        $role->givePermissionTo('readInfoEquip');
        $role->givePermissionTo('readInfoPersonal');
        //Staff Tecnic
        $role = Role::findByName('staffTecnic');
        $role->givePermissionTo('readInfoFisica');
        $role->givePermissionTo('crudInfoTecnica');
        $role->givePermissionTo('crudInfoEquip');
        $role->givePermissionTo('readInfoPersonal');
        //Staff Delegat
        $role = Role::findByName('staffDelegat');
        $role->givePermissionTo('readInfoFisica');
        $role->givePermissionTo('crudInfoTecnica');
        $role->givePermissionTo('crudInfoEquip');
        $role->givePermissionTo('readInfoPersonal');
        //Jugador
        $role = Role::findByName('jugador');
        $role->givePermissionTo('readInfoFisica');
        $role->givePermissionTo('readInfoTecnica');
        $role->givePermissionTo('readInfoEquip');
        $role->givePermissionTo('readInfoPersonal');
    }

    function assignRolesToUsers() {
        $user = User::where('id', '=', 1)->first();
        $user->assignRole('staffTecnic');
        $user = User::where('id', '=', 2)->first();
        $user->assignRole('staffFisic');
    }

    function givePermCrudInfoTecnica() {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $user->givePermissionTo('crudInfoTecnica');
        return redirect('perfil');
    }

    function giveRoleStaffTecnic() {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $user->assignRole('staffTecnic');
        return redirect('perfil');
    }

    function createJugadorDHB(){

        $modelHasRoleInTeam = new Model_Has_Role_In_Team;
        $modelHasRoleInTeam->model_id = 10;
        $modelHasRoleInTeam->role_id = 4;
        $modelHasRoleInTeam->team_id = 1;

        $modelHasRoleInTeam->save();

        $jugador = Jugador::create([
            'id_jugador' => 4,
            'id_persona' => 10,
            'fitxa' => 'AS70925',
            'gols' => 6
        ]);

        $juga = Juga::create([
            'id_jugador' => 10,
            'id_equip' => 1,
            'dorsal' => 7,
            'nom_dorsal' => 'Gibert',
            'data_inici' => '2020-07-15',
            'data_inici' => '2021-07-15',
            'img' => '../img/img-carnet/perfils/pegito.png'
        ]);
        return redirect('equips');
    }

}
