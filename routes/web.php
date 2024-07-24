<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;

// Display home
Route::get('/', function () {
    return view('index');
})->name('home');

// Display Article
Route::get('/article', function () {
    return view('article');
})->name('article');

// Category routes
Route::prefix('admin')->group(function () {
    
    // List Category
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');

    // Form to create Category
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');

    // Form to edit Category
    Route::get('category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    // Form to store new Category
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');

    // Form to update Category
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    // Form to delete Category
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});

//--------------------------------------------------

// Tag routes
Route::prefix('admin')->group(function () {
    
    // List Tag
    Route::get('tag', [TagController::class, 'index'])->name('admin.tag.index');

    // Form to create Tag
    Route::get('tag/create', [TagController::class, 'create'])->name('admin.tag.create');

    // Form to edit Tag
    Route::get('tag/{id}', [TagController::class, 'edit'])->name('admin.tag.edit');

    // Form to store new Tag
    Route::post('tag/store', [TagController::class, 'store'])->name('admin.tag.store');

    // Form to update Tag
    Route::put('tag/{id}', [TagController::class, 'update'])->name('admin.tag.update');

    // Form to delete Tag
    Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
});

//-------------------------------------------------------
// Tag routes
Route::prefix('admin')->group(function () {
    
    // List Tag
    Route::get('post', [PostController::class, 'index'])->name('admin.post.index');

    // Form to create Tag
    Route::get('post/create', [PostController::class, 'create'])->name('admin.post.create');

    // Form to edit Tag
    Route::get('post/{id}', [PostController::class, 'edit'])->name('admin.post.edit');

    // Form to store new Tag
    Route::post('post/store', [PostController::class, 'store'])->name('admin.post.store');

    // Form to update Tag
    Route::put('post/{id}', [PostController::class, 'update'])->name('post.post.update');

    // Form to delete Tag
    Route::delete('post/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
});
