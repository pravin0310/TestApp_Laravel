<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\CustomLoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/custom-login', [CustomLoginController::class, 'showLoginForm'])->name('custom.login');
Route::post('/custom-login', [CustomLoginController::class, 'login']);

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
