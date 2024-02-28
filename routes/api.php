<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TagController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user:id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

});


Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function () {

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::patch('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


    Route::post('/posts/{post}/favorite', [FavoriteController::class, 'store']);
    Route::delete('/posts/{post}/favorite', [FavoriteController::class, 'destroy']);

    Route::patch('/users', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/like/{type}/{id}', [LikeController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/follow/{type}/{id}', [FollowController::class, 'toggleFollow'])->name('follow.toggle');


    // новые
    Route::post('/hide/{type}/{id}', [HideController::class, 'toggleHide'])->name('hide.toggle'); // как лайк и follow

    Route::post('/groups/', [GroupController::class, 'store'])->name('groups.store'); // Добавить новую группу постов
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy'); // Удалить группу постов

    Route::post('/groups/{group}/posts/{post}', [GroupController::class, 'add'])->name('groups.posts.add'); // Добавить пост в группу
    Route::delete('/groups/{group}/posts/{post}', [GroupController::class, 'remove'])->name('groups.posts.remove'); // Удалить пост из группы

    Route::post('/achievements/users/{user}', [AchievementController::class, 'store'])->name('achievements.store'); // присвоить ачивку пользователю
    Route::delete('/achievements/users/{user}', [AchievementController::class, 'destroy'])->name('achievements.destroy'); // удалить ачивку у пользователя
    // новые

});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
    Route::post('/me', 'me');
    Route::post('/refresh', 'refresh');
});
