<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewFilesController;
use App\Http\Controllers\FileApprovalController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/upload', [UploadFile::class, 'upload']);
Route::get('/view-files', [ViewFilesController::class, 'index'])->name('view-files');
Route::post('/filterData', [ViewFilesController::class, 'filteredData'])->name('filterData');


Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/files', [FileApprovalController::class, 'index'])->name('files');
    Route::post('/approve', [FileApprovalController::class, 'approveFiles'])->name('approve');
    Route::post('/reject', [FileApprovalController::class, 'rejectFiles'])->name('reject');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');




Auth::routes();

