<?php

use App\Models\User;
use App\Models\Zone;
use App\Models\Offre;
use App\Models\Ville;
use App\Models\Commune;
use App\Models\Prospect;
use App\Models\Province;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\Api\ProspectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// API Authentification
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require('api-content.php');
require('api-prospect.php');

Route::post('/prospect', [App\Http\Controllers\ProspectController::class, 'Apistore'])->name('prospect.store');


Route::get('/users', function(){
    return User::all();
});
Route::put('/users/{id}', function(User $id){
    $id->update([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>Hash::make(request('password'))
    ]);
});
Route::delete('/users/{id}', function(User $id){
    $id->delete();
});

// url pour recuperer les prospects de la BD
Route::get('/prospects', [App\Http\Controllers\Api\ProspectController::class, 'index'])->name('prospect.index');
// url pour recuperer les informations de x prospect de la BD -> {id} est le id du prospect
// Route::get('/prospect/agent/{id}', [App\Http\Controllers\Api\ProspectController::class, 'show'])->name('prospect.show');

// url pour sauvegarder les informations de x prospect dans la BD
Route::post('/prospect', [App\Http\Controllers\Api\ProspectController::class, 'store'])->name('prospect.store');
//url pour visualiser le status d'un prospect x dans la BD
Route::get('/prospects/state/{state}', [App\Http\Controllers\Api\ProspectController::class, 'allwithstate'])->name('prospect.index');

