<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


//Display home
Route::get('/', function () {
    return view('index');
})->name('home');

//Display Article
Route::get('/article', function () {
    return view('article');
})->name('article');


// List Category
Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category.index');

// Form to create Category
Route::get('admin/category/create',[CategoryController::class,'create'])->name('admin.category.create');

// Form to edit Category
Route::get('admin/category/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');

// Form to store new Category
Route::post('admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');

// Form to update Category
Route::put('admin/category/{id}',[CategoryController::class,'update'])->name('admin.category.update');

// Form to delete Category
Route::delete('admin/category/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

//--------------------------------------------------

//List Tag
Route::get('admin/tag',[TagController::class,'index'])->name('admin.tag.index');

// Form to create Tag
Route::get('admin/tag/create',[TagController::class,'create'])->name('admin.tag.create');

// Form to edit Tag
Route::get('admin/tag/{id}',[TagController::class,'edit'])->name('admin.tag.edit');

// Form to store new Tag
Route::post('admin/tag/store',[TagController::class,'store'])->name('admin.tag.store');

// Form to update Tag
Route::put('admin/tag/{id}',[TagController::class,'update'])->name('admin.tag.update');


// Form to delete Tag
Route::delete('admin/tag/{id}',[TagController::class,'destroy'])->name('admin.tag.destroy');
