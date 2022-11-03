<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PostController;
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

Route::get('/hello-creative', fn() => view('hello-creative'));

Route::get('/', [PageController::class, 'home']);

Route::get('/posts/show/{slug}-{id}', [PostController::class, 'show'])->name('pages.show');

// Route::get('postsList', [PostController::class, 'index'])->name('posts.postsList');


// --------- ADMIN --------- //
Route::get('admin/posts', [AdminPostController::class, 'index'])->name('posts.index');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
Route::post('admin/posts/store', [AdminPostController::class, 'store'])->name('posts.store');

Route::post('admin/posts/destroy/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');

Route::get('admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
Route::post('admin/posts/{id}', [AdminPostController::class, 'update'])->name('posts.update');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
