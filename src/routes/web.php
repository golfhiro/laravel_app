<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('top');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('book', BookController::class);

Route::post('/book/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Route::get('tag/export', [App\Http\Controllers\TagController::class, 'export']);
Route::get('tag/download', [App\Http\Controllers\TagController::class, 'download']); //ダウンロード

Route::get('csv/upload', [App\Http\Controllers\CsvUploadController::class, 'index']); //表示
Route::post('csv/upload', [App\Http\Controllers\CsvUploadController::class, 'upload_regist']);//登録

Route::post('/book/bookmark/{book}', [BookmarkController::class, 'bookmark'])->name('bookmark');
Route::delete('/book/unbookmark/{book}', [BookmarkController::class, 'unbookmark'])->name('unbookmark');

require __DIR__.'/auth.php';
