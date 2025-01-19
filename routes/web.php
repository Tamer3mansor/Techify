<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContatcController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;


# Auth route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
# Theme Controller
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{name}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/singleBlog', 'singleBlog')->name('singleBlog');

});
Route::post('my-blog',[BlogController::class,'myBlog'])->name('blogs.myBlog');
# Subscribe Route
Route::post('sub/store', [SubscriberController::class, 'store'])->name('sub.store');
# contact route
Route::post( 'contact/store', [ContatcController::class, 'store'])->name('contact.store');
//comments Route
Route::post( 'comment/store', [CommentController::class, 'store'])->name('comment.store');
// blog routes
Route::resource('blogs', BlogController::class);
require __DIR__ . '/auth.php';

