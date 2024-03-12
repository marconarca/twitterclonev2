<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// idea/{idea}/comments
Route::resource('idea.comments', CommentController::class)->only([
    'store'
])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware(('auth'));

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('idea/{idea}/like', [IdeaController::class, 'like'])->middleware('auth')->name('idea.like');
Route::post('idea/{idea}/unlike', [IdeaController::class, 'unlike'])->middleware('auth')->name('idea.unlike');

Route::get('/terms', function() {
    return view('terms');
})->name('terms');


