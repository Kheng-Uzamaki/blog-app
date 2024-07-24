<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\tagsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/article', function () {
    return view('article');
})->name('article');


Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category.index');
Route::get('admin/category/create',[CategoryController::class,'create'])->name('admin.category.create');
Route::get('admin/category/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
Route::post('admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');

//update
Route::put('admin/category/{id}',[CategoryController::class,'update'])->name('admin.category.update');
//delete
Route::delete('admin/category/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

//--------------------------------------------------
Route::get('admin/tag',[TagController::class,'index'])->name('admin.tag.index');
Route::get('admin/tag/create',[TagController::class,'create'])->name('admin.tag.create');
Route::get('admin/tag/{id}',[TagController::class,'edit'])->name('admin.tag.edit');
Route::post('admin/tag/store',[TagController::class,'store'])->name('admin.tag.store');

//update
Route::put('admin/tag/{id}',[TagController::class,'update'])->name('admin.tag.update');
//delete
Route::delete('admin/tag/{id}',[TagController::class,'destroy'])->name('admin.tag.destroy');
