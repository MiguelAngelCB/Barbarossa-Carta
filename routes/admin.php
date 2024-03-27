<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DishController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('dishes', DishController::class)->except('show')->names('admin.dishes');