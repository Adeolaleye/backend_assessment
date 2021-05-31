<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/events', [EventController::class, 'store'])->name('events.create');

Route::get('/events/actors/{id}', [EventController::class, 'getActorById'])->name('events.getactorbyid');

Route::get('/actors/streak', [EventController::class, 'streak'])->name('actors.streak');

Route::put('/actors', [EventController::class, 'actorsPut'])->name('events.autorput');

Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/actors', [EventController::class, 'actors'])->name('events.actors');

Route::delete('/erase', [EventController::class, 'delete'])->name('events.delete');