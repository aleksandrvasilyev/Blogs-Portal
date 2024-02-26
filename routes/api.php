<?php


use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user:id}', [UserController::class, 'show'])->name('users.show');


    Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');


    Route::middleware('auth')->group(function () {
        Route::post('/posts/{post}', [PostController::class, 'store'])->name('posts.store');
        Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::patch('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


        Route::post('/posts/{post}/like', [LikeController::class, 'store']);
        Route::delete('/posts/{post}/unlike', [LikeController::class, 'delete']);

        Route::post('/posts/{post}/favorite', [FavoriteController::class, 'store']);
        Route::delete('/posts/{post}/unfavorite', [FavoriteController::class, 'delete']);


        Route::post('/users/{user}', [UserController::class, 'store'])->name('users.store');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    });

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






