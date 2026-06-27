<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/set-admin/{user}', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/set-revisor/{user}', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/set-writer/{user}', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});
Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
});
Route::middleware('revisor')->group(function () {
    // ...
    Route::patch('/accept/article/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::patch('/reject/article/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::patch('/undo/article/{article}', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});
