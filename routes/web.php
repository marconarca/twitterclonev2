<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');

Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/idea/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::get('/terms', function() {
    return view('terms');
});


