<?php

use App\Http\Controllers\Api\ProspectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupUserController;



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

require('web-content.php');

//Route utiliser pour recuperer les status de nos prospects
// Route::get('/prospect-statut-attente', [App\Http\Controllers\ProspectController::class, 'statusAttente'])->name('prospect.attente');
// Route::get('/prospect-statut-valider', [App\Http\Controllers\ProspectController::class, 'statusValide'])->name('prospect.valider');
// Route::get('/prospect-statut-rejeter', [App\Http\Controllers\ProspectController::class, 'statusRejete'])->name('prospect.rejeter');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('group', GroupController::class);
    Route::resource('groupusers', GroupUserController::class);

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map_index');
    Route::get('/map/ville/{id}', [App\Http\Controllers\MapController::class, 'villes'])->name('map_ville');
    Route::get('/map/zone/{id}', [App\Http\Controllers\MapController::class, 'zones'])->name('map_zone');
    Route::get('/map/commune/{id}', [App\Http\Controllers\MapController::class, 'communes'])->name('map_commune');
    Route::get('/map/filtre', [App\Http\Controllers\MapController::class, 'filtre'])->name('map_filtre');


    Route::get('/prospect', [App\Http\Controllers\ProspectController::class, 'index'])->name('prospect');

    Route::get('upload-image', [App\Http\Controllers\UploadFilesController::class, 'index'])->name('upload-image');
    Route::post('save', [App\Http\Controllers\UploadFilesController::class, 'save'])->name('save');
    Route::get('/prospect/{id}', [App\Http\Controllers\ProspectController::class, 'show'])->name('prospect.show');

    //Route utiliser pour recuperer les status de nos prospects
    Route::get('/prospects/statut/attente', [App\Http\Controllers\ProspectController::class, 'statusAttente'])->name('prospect.attente');
    Route::get('/prospects/statut/valider', [App\Http\Controllers\ProspectController::class, 'statusValide'])->name('prospect.valider');
    Route::get('/prospects/statut/rejeter', [App\Http\Controllers\ProspectController::class, 'statusRejete'])->name('prospect.rejeter');
    Route::get('/prospect/operations/{id}/{status}', [App\Http\Controllers\ProspectController::class, 'operationprospect'])->name('prospect.operations');
    Route::get('/visualize-prospect', [App\Http\Controllers\ProspectController::class, 'visualizeProspect'])->name('visualise.prospect');


    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::post('/users/form', [UserController::class, 'create'])->name('add_user');
    Route::get('userEdit/{id}', [UserController::class, 'edit']);
    Route::post('update-data/{id}', [UserController::class, 'update'])->name('update_data');
    Route::get('deleteUser/{id}', [UserController::class, 'remove']);

    Route::get('/prospects', [App\Http\Controllers\ProspectController::class, 'index'])->name('prospect');

    Route::get('upload-image', [App\Http\Controllers\UploadFilesController::class, 'index'])->name('upload-image');
    Route::post('save', [App\Http\Controllers\UploadFilesController::class, 'save'])->name('save');
    Route::get('/prospect/{id}', [App\Http\Controllers\ProspectController::class, 'show'])->name('prospect.show');

    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::post('/users/form', [UserController::class, 'create'])->name('add_user');
    Route::get('userEdit/{id}', [UserController::class, 'edit']);
    Route::post('update-data/{id}', [UserController::class, 'update'])->name('update_data');
    Route::get('deleteUser/{id}', [UserController::class, 'remove']);

});

Auth::routes();
