<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PickupPointController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ── Autenticazione ────────────────────────────────────────────────────────────
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login',    [AuthController::class, 'login']);

    Route::middleware('auth.jwt')->group(function () {
        Route::post('logout',  [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('me',       [AuthController::class, 'me']);
    });
});

// ── Rotte pubbliche ────────────────────────────────────────────────────────────
Route::get('pickup-points',      [PickupPointController::class, 'index']);
Route::get('pickup-points/{id}', [PickupPointController::class, 'show']);

// ── Rotte autenticate ─────────────────────────────────────────────────────────
Route::middleware('auth.jwt')->group(function () {
    // Profilo utente
    Route::get('profile',  [UserController::class, 'show']);
    Route::put('profile',  [UserController::class, 'update']);

    // Pacchi
    Route::post('packages/check', [PackageController::class, 'check']);
    Route::get('my-packages',     [PackageController::class, 'myPackages']);

    // Preferiti
    Route::get('favorites',              [FavoriteController::class, 'index']);
    Route::post('favorites',             [FavoriteController::class, 'store']);
    Route::delete('favorites/{pointId}', [FavoriteController::class, 'destroy']);
});

// ── Rotte di servizio (admin) ─────────────────────────────────────────────────
Route::middleware('admin.key')->prefix('admin')->group(function () {
    Route::post('packages', [PackageController::class, 'store']);
});
