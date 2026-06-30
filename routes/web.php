<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');



Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');



Route::middleware('writer')->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
});



Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');

    Route::patch('/accept/article/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::patch('/reject/article/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::patch('/undo/article/{article}', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});


Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::patch('/admin/set-admin/{user}', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/set-revisor/{user}', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/set-writer/{user}', [AdminController::class, 'setWriter'])->name('admin.setWriter');

    Route::put('/admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});