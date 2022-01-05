<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

Route::get('/', [TopController::class, 'index'])->name('top');
Route::post('/items/register', [TopController::class, 'register'])->name('items.register');
Route::put('/items/{id}/complete', [TopController::class, 'complete'])->name('items.complete');
Route::delete('/items/{id}/delete', [TopController::class, 'delete'])->name('items.delete');
