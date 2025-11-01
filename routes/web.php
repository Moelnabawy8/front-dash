<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestmonialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix("front")->group(function () {
    Route::view('/home', 'themes.index')->name('home');
    Route::view('/about', 'themes.about')->name('about');
    Route::view('/contact', 'themes.contact')->name('contact');
    Route::view('/service', 'themes.service')->name('service');
});

Route::name("admin.")->prefix(LaravelLocalization::setLocale() . "/admin")
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->group(function () {
        Route::middleware('auth')->group(function () {
            Route::view('/', 'admin.dashboard.index')->name('index');
            Route::resource('services', ServiceController::class);
            Route::resource('features', FeatureController::class);
            Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
            Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
            Route::resource('testmonials', TestmonialController::class);
        });




        require __DIR__ . '/auth.php';
    });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });