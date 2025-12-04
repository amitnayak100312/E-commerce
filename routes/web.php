<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/userdashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('userdashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    
    //category
    Route::get('/addcategory', [AdminController::class, 'addcategory'])->name('admin.addcategory');
    Route::post('/addcategory', [AdminController::class, 'postaddcategorty'])->name('admin.postaddcategory');
    Route::post('/updatecategory/{id}', [AdminController::class, 'postupdatecategory'])->name('admin.postupdatecategory');
    Route::get('/viewcategory', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/categoryupdate/{id}', [AdminController::class, 'categoryUpdate'])->name('admin.categoryupdate');
    Route::get('/categorydelete/{id}', [AdminController::class, 'categoryDelete'])->name('admin.categorydelete');
    
    //product
    Route::get('/addproduct', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/addproduct', [AdminController::class, 'postaddproduct'])->name('admin.postaddproduct');
    Route::get('/viewproduct', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::get('/deleteprodcut/{id}', [AdminController::class, 'deleteProdcut'])->name('admin.deleteprodcut');
    
});

require __DIR__ . '/auth.php';
