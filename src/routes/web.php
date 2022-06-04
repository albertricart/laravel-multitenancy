<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/teams/change/{hash}', [TeamController::class, 'change_current_team'])->name('changeTeam');

    Route::controller(TaskController::class)->group(function() {
        Route::get('/tasks/create', 'create')->name('tasks.create');
        Route::post('/tasks/store', 'store')->name('tasks.store');
    });
});



require __DIR__.'/auth.php';
