<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/clients');
});

Route::resource('clients', ClientController::class);
Route::delete('/clients/destroy-all', [ClientController::class, 'destroyAll'])->name('clients.destroyAll');
Route::post('/clients/{client}', [ClientController::class, 'update'])->name('clients.updateOne');
