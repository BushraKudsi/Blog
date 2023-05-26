<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategoryController;
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


Route::get('/cat/create',[\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/cat/create',[\App\Http\Controllers\CategoryController::class, 'store']);


Route::controller(CategoryController::class)->prefix('cat')->group(function () {
    Route::get('{category}', 'filter');
});
Route::controller(BlogPostController::class)->prefix('blog')->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('create', 'store');
    Route::get('search/{title}', 'search');

});
Route::controller(BlogPostController::class)->prefix('post')->group(function () {
    Route::get('{blogPost}', 'show');
    Route::get('edit/{blogPost}', 'edit');
    Route::put('edit/{blogPost}', 'update');
    Route::delete('{blogPost}', 'destroy');
    Route::delete('delete/{blogPost}', 'deletePostFromHome');
});


