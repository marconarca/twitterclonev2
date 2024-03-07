<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

// This is comment out because of Route::resource
// Route::group([
//     'prefix' => 'idea/',
//     'as'     => 'idea.',
    
// ], function() {
//     Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group([
//         'middleware' => ['auth']
//     ], function() {
//         Route::post('', [IdeaController::class, 'store'])->name('store');

//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    
//         Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    
//         Route::delete('/{id}', [IdeaController::class, 'destroy'])->name('destroy');
    
//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//     });

// });

Route::resource('idea', IdeaController::class)->except([
    'index',
    'create',
    'show'
])->middleware('auth');

Route::resource('idea', IdeaController::class)->only([
    'show'
]);

Route::resource('idea.comments', IdeaController::class)->only([
    'store'
])->middleware('auth');

// idea/{idea}/comments

Route::get('/terms', function() {
    return view('terms');
});


