<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PanelController as AdminPanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
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

// Affichage des articles
Route::get('/', [PageController::class, 'home']);
// Affichage des détails articles 
Route::get('/posts/show/{id}-{slug}', [PostController::class, 'show'])->name('pages.show');


// --------- ADMIN --------- //
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function()
{
    Route::get('panel', [AdminPanelController::class, 'index'])->name('panel');
 
    // POST  ----------------------------------------------------
    // Affichage de la liste des postes avec boutons admin
    Route::get('posts', [AdminPostController::class, 'index'])->name('posts.index');

    // Création des articles 
    Route::get('posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [AdminPostController::class, 'store'])->name('posts.store');

    // Suppression des articles
    Route::delete('posts/destroy/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');

    // Modification des articles
        // value  => id
        // update => id
    Route::get('posts/{value}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{update}', [AdminPostController::class, 'update'])->name('posts.update');




    // CATEGORY  ----------------------------------------------------
    // Affichage de la liste des categoris avec boutons admin
    Route::get('categories', [AdminCategoryController::class, 'index'])->name('categories.index');

    // Création des catégories
    Route::get('categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');

    // Suppression des articles
    Route::delete('categories/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Modification des articles
    // value  => id
    // update => id
    Route::get('categories/{value}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{update}', [AdminCategoryController::class, 'update'])->name('categories.update');
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
