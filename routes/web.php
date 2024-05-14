<?php

use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CardDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\GifController;

Route::group(['middleware' => ['guest']], function () {
    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function () {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    /**
     * Delete Routes
     */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete');

    /**
     * Logout Routes
     */
    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    /**
     * Business Card Routes
     */
    Route::get('/business_cards', [BusinessCardController::class, 'index'])->name('business_cards.index');
    Route::get('/business_cards/create', [BusinessCardController::class, 'create'])->name('business_cards.create');
    Route::post('/business_cards', [BusinessCardController::class, 'store'])->name('business_cards.store');
    Route::get('/business_cards/{businessCard}', [BusinessCardController::class, 'show'])->name('business_cards.show');
    Route::get('/business_cards/{businessCard}/edit', [BusinessCardController::class, 'edit'])->name('business_cards.edit');
    Route::put('/business_cards/{businessCard}', [BusinessCardController::class, 'update'])->name('business_cards.update');
    Route::delete('/business_cards/{businessCard}', [BusinessCardController::class, 'destroy'])->name('business_cards.destroy');
    Route::get('qrcode/{id}', [QrCodeController::class, 'show'])->name('qrcode.show');
});

Route::get('/card/display/{id}', [CardDetailController::class, 'display'])->name('card.display');

Route::get('/', function () {
    return view('dashboard.index');
});
