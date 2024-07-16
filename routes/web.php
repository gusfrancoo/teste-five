<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileApprovalController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/upload', [UploadFile::class, 'upload']);

Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/files', [FileApprovalController::class, 'index'])->name('files');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');




Auth::routes();

