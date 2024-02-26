<?php

use App\Http\Controllers\AuthPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('{user}/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');


Route::middleware('auth')->group(function () {
    Route::get('/create', [AuthPostController::class, 'create'])->name('profile.posts.create');
    Route::post('/posts', [AuthPostController::class, 'store'])->name('profile.posts.store');
    Route::get('/posts/{post:id}/edit', [AuthPostController::class, 'edit'])->name('profile.posts.edit');
    Route::patch('/posts/{post:id}', [AuthPostController::class, 'update'])->name('profile.posts.update');
    Route::delete('/posts/{post:id}/delete', [AuthPostController::class, 'destroy'])->name('profile.posts.delete');

});


Route::get('/dashboard', [ProfileController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




