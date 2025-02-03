<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


Route::prefix('v1')->name('users')->group(function(){
    Route::get('/users', [UsersController::class,'index'])->name('index');
    Route::get('/users/{user}', [UsersController::class,'show'])->name('show');
    Route::post('/users', [UsersController::class,'store'])->name('store');
    Route::patch('/users/{user}', [UsersController::class,'update'])->name('update');
    Route::delete('/users/{user}', [UsersController::class,'delete'])->name('delete');
});


