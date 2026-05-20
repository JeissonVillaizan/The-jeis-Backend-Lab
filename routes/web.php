<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CertificationController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/certifications', [CertificationController::class, 'index'])->name('certifications');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::post('/certifications', [CertificationController::class, 'store'])->name('certifications.store');
Route::delete('/certifications/{certification}', [CertificationController::class, 'destroy'])->name('certifications.destroy');
Route::get('/locale/{locale}', [LocaleController::class, 'update'])->name('locale.update');
