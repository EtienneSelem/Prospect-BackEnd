<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TypeActivitiesController;

;


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

// routes province

Route::get('/provinces', [ProvinceController::class, 'index'])->name('province');
Route::post('/province', [App\Http\Controllers\ProvinceController::class, 'store'])->name('province_create');
Route::put('province/{id}', [App\Http\Controllers\ProvinceController::class, 'update'])->name('province_edit');
Route::delete('Province/delete/{id}',[App\Http\Controllers\ProvinceController::class, 'remove'])->name('deleteProvince');

//routes ville

Route::get('/villes', [VilleController::class, 'index'])->name('ville');
Route::post('/ville', [App\Http\Controllers\VilleController::class, 'store'])->name('ville_create');
Route::put('Ville/{id}', [App\Http\Controllers\VilleController::class, 'update'])->name('ville_edit');
Route::delete('Ville/delete/{id}',[App\Http\Controllers\VilleController::class, 'remove'])->name('deleteVille');

//routes zone

Route::get('/zones', [ZoneController::class, 'index'])->name('zone');
Route::post('/zone', [App\Http\Controllers\ZoneController::class, 'store'])->name('zone_create');
Route::put('Zone/{id}', [App\Http\Controllers\ZoneController::class, 'update'])->name('zone_edit');
Route::delete('Zone/delete/{id}',[App\Http\Controllers\ZoneController::class, 'remove'])->name('deleteZone');

//routes commune

Route::get('/communes', [CommuneController::class, 'index'])->name('commune');
Route::post('/commune', [CommuneController::class, 'store'])->name('commune_create');
Route::put('Commune/{id}', [App\Http\Controllers\CommuneController::class, 'update'])->name('commune_edit');
Route::delete('Commune/delete{id}',[App\Http\Controllers\CommuneController::class, 'remove'])->name('deleteCommune');

//routes offre

Route::get('/offres', [OffreController::class, 'index'])->name('offre');
Route::post('/offre', [App\Http\Controllers\OffreController::class, 'store'])->name('offre_create');
Route::put('Offre/{id}',[App\Http\Controllers\OffreController::class, 'update'])->name('offre_edit');
Route::delete('Offre/delete/{id}',[App\Http\Controllers\OffreController::class, 'remove'])->name('deleteOffre');

//routes typeActivity

Route::get('/type-activities', [TypeActivitiesController::class, 'index'])->name('typeActivity');
Route::post('/type-activities', [TypeActivitiesController::class, 'store'])->name('typeActivity_create');
Route::put('type-activities/{id}',[TypeActivitiesController::class, 'update'])->name('typeActivity_edit');
Route::delete('type-activities/delete/{id}',[TypeActivitiesController::class, 'remove'])->name('deleteTypeActivity');


