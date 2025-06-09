<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BorrowingController;

Route::view('/', 'welcome');

Route::resource('books', BookController::class);
Route::resource('customers', CustomerController::class);
Route::resource('borrowings', BorrowingController::class);
