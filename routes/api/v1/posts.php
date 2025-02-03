<?php


use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->name('posts')->group(function(){
    Route::get('/posts/{page_size}', [PostController::class,'index'])->name('index');
    Route::get('/posts/{post}', [PostController::class,'show'])->name('show');
    Route::post('/posts', [PostController::class,'store'])->name('store');
    Route::patch('/posts/{post}', [PostController::class,'update'])->name('update');
    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('delete');
});
