<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PartitController;
use App\Http\Controllers\CrudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Public Routes
Route::get('', function () {return view('public.home');});
Route::get('historia', function () {return view('public.historia');});
Route::get('inscripcio', function () {return view('public.inscripcio');});
Route::get('botiga', function () {return view('public.botiga');});
Route::get('noticies', function () {return view('public.noticies');});
Route::get('resultats', function () {return view('public.resultats');});
Route::get('contactar', function () {return view('public.contactarStaff');});
Route::get('quisom', function () {return view('public.quiSom');});

//Auth Routes
Route::get('login', [UserAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('logout', [UserAuthController::class, 'logout']);

//Private Routes
Route::get('perfil', [UserAuthController::class, 'profile'])->middleware('isLogged');
Route::get('equips', [ZoneController::class, 'equips'])->middleware('isLogged');
Route::get('estudis/{id_equip}', [
    'as' => 'estudis', 'uses' => 'App\Http\Controllers\ZoneController@studies'
])->middleware('isLogged');

//Database CRUD
    //Partits CRUD
    //Route::resource('updatePartitModalResource', PartitController::class)->middleware('isLogged');
    Route::post('createPartitModal', [CrudController::class, 'createPartit'])->middleware('isLogged');
    Route::post('updatePartitModal', [CrudController::class, 'updatePartit'])->middleware('isLogged');
    Route::post('deletePartitModal', [CrudController::class, 'deletePartit'])->middleware('isLogged');


//Test Routes
Route::get('createRP', [RolesController::class, 'createRolesPermissionsTable'])->middleware('isLogged');
Route::get('givePermCrudInfoTecnica', [RolesController::class, 'givePermCrudInfoTecnica'])->middleware('isLogged');
Route::get('giveRoleStaffTecnic', [RolesController::class, 'giveRoleStaffTecnic'])->middleware('isLogged');