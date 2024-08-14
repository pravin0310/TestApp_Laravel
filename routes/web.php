<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportUserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/import', [AdminController::class, 'showImportForm'])->name('admin.import.form');
    Route::post('/admin/import', [AdminController::class, 'import'])->name('admin.import');
});
