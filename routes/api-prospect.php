<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProspectController;

// url pour recuperer les prospects de la BD
Route::get('/prospects', [App\Http\Controllers\Api\ProspectController::class, 'index'])->name('prospect.index');

Route::middleware(['auth:sanctum'])->group(function () {
    //url pour recuperer des prospects en rapport avec l'agent connecté
    Route::get('/prospects/agent/current', [App\Http\Controllers\Api\ProspectController::class, 'getByCurrentUser'])->name('prospect.getByCurrentUser');
});
// url pour recuperer les informations de x prospect de la BD -> {id} est le id du prospect
Route::get('/prospect/agent/{id}', [App\Http\Controllers\Api\ProspectController::class, 'getByAgentId'])->name('prospect.show');

// Route::get('/prospect/agent/{id}', [App\Http\Controllers\Api\ProspectController::class, 'show'])->name('prospect.show');
Route::get('/prospects/agent/{id}', [App\Http\Controllers\Api\ProspectController::class, 'getByAgentId'])->name('prospect.show');

// url pour sauvegarder les informations de x prospect dans la BD
Route::post('/prospects', [App\Http\Controllers\Api\ProspectController::class, 'store'])->name('prospect.store');
//url pour visualiser le status d'un prospect x dans la BD
Route::get('/prospects/state/{state}', [App\Http\Controllers\Api\ProspectController::class, 'allwithstate'])->name('prospect.index');

Route::get('/prospects/{remoteId}/status', [ProspectController::class, 'getStatusByRemoteId'])->name('prospect.getStatusByRemoteId');






