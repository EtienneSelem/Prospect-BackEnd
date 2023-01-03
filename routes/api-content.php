<?php
use App\Models\Zone;
use App\Models\Offre;
use App\Models\Ville;
use App\Models\Commune;
use App\Models\Province;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TypeActivitiesController;

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




Route::get('/provinces',[ProvinceController::class,'apiGetAll']);
Route::get('/offres',[OffreController::class,'apiGetAll']);
Route::get('/type-activities',[TypeActivitiesController::class,'apiTypeActivities']);
Route::get('/zones/ville/{id}',[ZoneController::class,'apiGetByVille']);
Route::get('/communes/zone/{id}',[CommuneController::class,'apiGetByZone']);
Route::get('/villes/province/{id}',[VilleController::class,'apiGetByProvince']);

Route::get('/provinces', function(){
    return Province::all();
});
Route::get('/provinces/{id}',[ProvinceController::class,'apiGetAll']);
Route::get('/villes', function(){
    return Ville::all();
});
Route::get('/zones', function(){
    return Zone::all();
});
Route::get('/communes', function(){
    return Commune::all();
});
Route::get('/offres', function(){
    return Offre::all();
});
