<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [UserController::class,'home'])->name('index');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/addtocart/{id}', [UserController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('add_to_cart');
Route::get('/cartproducts', [UserController::class, 'cartproducts'])->middleware(['auth', 'verified'])->name('cartproducts');
Route::get('/removecartproduct/{id}', [UserController::class, 'removecartproduct'])->middleware(['auth', 'verified'])->name('removecartproduct');
//user
Route::get('/product_details/{id}', [UserController::class, 'product_details'])->name('product_details');
Route::get('/viewallproducts', [UserController::class, 'viewallproducts'])->name('viewallproducts');

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
    Route::any('/search', [AdminController::class, 'search'])->name('admin.search');
    
    //product
    Route::get('/addproduct', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/addproduct', [AdminController::class, 'postaddproduct'])->name('admin.postaddproduct');
    Route::get('/viewproduct', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::get('/deleteprodcut/{id}', [AdminController::class, 'deleteProdcut'])->name('admin.deleteprodcut');
    Route::get('/productupdate/{id}', [AdminController::class, 'productUpdate'])->name('admin.productupdate');
    Route::post('/updateproduct/{id}', [AdminController::class, 'postupdateproduct'])->name('admin.postupdateproduct');
    Route::any('/searchproduct', [AdminController::class, 'searchproduct'])->name('admin.searchproduct');
});

require __DIR__ . '/auth.php';
