<?php

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
    return view('pages.home');
});


Route::get('/blog',[\App\Http\Controllers\BlogPostController::class, 'index']);

Route::get('/blog/post{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);

Route::get('/blog/create', [\App\Http\Controllers\BlogPostController::class, 'create']); 
Route::post('/blog/create', [\App\Http\Controllers\BlogPostController::class, 'store']);

Route::get('/blog/post{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); 
Route::put('/blog/post{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']);
Route::delete('/blog/post{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']);
Route::delete('/blog/post{blogPost}/delete', [\App\Http\Controllers\BlogPostController::class, 'deletePostFromHome']);
Route::get('/blog/cat{category}', [\App\Http\Controllers\CategoryController::class, 'filter']);
Route::get('/blog/search/{title}', [\App\Http\Controllers\BlogPostController::class, 'search']);





