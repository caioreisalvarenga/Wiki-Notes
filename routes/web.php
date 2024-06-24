<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NotesController;

Route::get('/layouts/app', function () {
    return view('/layouts/app');
})->name('/layouts/app');

// Route::prefix('notes')->group(function () {
Route::get('/dashboard', [NotesController::class, 'index'])->name('dashboard');
Route::post('/add-new-note/store', [NotesController::class, 'store'])->name('add-new-note');
Route::get('/show-notes/{id}', [NotesController::class, 'show'])->name('show-notes-id');
Route::put('/update-note/{id}', [NotesController::class, 'update'])->name('update-note');
Route::delete('/delete-note/{id}', [NotesController::class, 'destroy'])->name('delete-note');

Route::get('/add-notes', function () {
    return view('add-notes');
})->name('add-notes');

Route::get('/update-note', function () {
    return view('update-notes');
})->name('update-notes');

Route::get('/all-table-notes', function () {
    return view('all-table-notes');
})->name('table-notes');

Route::get('/', function () {
    return redirect('sign-in');
});
// });

Route::prefix('register')->group(function () {
    Route::get('/index-users', [RegisterController::class, 'index'])->name('index-users');
    Route::get('/show-user/{id}', [RegisterController::class, 'show'])->name('show-user');
    Route::put('/update-user-id/{id}', [RegisterController::class, 'update'])->name('update-user-id');
    Route::get('/update-user', function () {
        return view('update-user');
    })->name('update-user');
    Route::delete('/delete-user/{id}', [RegisterController::class, 'destroy'])->name('delete-user');

    Route::get('/profile', function () {
        return view('account-pages.profile');
    })->name('profile');
});

// Route::prefix('login')->group(function () {
    Route::get('/sign-in', [LoginController::class, 'create'])
        ->name('sign-in');

    Route::post('/sign-in', [LoginController::class, 'store']);

    Route::get('/sign-up-view', [RegisterController::class, 'create'])->name('sign-up-view');

    Route::post('/sign-up', [RegisterController::class, 'store'])->name('sign-up');

    Route::get('/signin', function () {
        return view('account-pages.signin');
    })->name('signin');
    Route::get('/signup', function () {
        return view('account-pages.signup');
    })->name('signup');

    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'store']);
// });
