<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', [ApiClientController::class, 'index'])->name('api.clients.index');
Route::get('/clients/{client}', [ApiClientController::class, 'getOne'])->name('api.clients.getOne');
Route::post('/clients', [ApiClientController::class, 'store'])->name('api.clients.store');
Route::put('/clients/{client}', [ApiClientController::class, 'update'])->name('api.clients.update');
Route::delete('/clients/{client}', [ApiClientController::class, 'destroy'])->name('api.clients.destroy');
