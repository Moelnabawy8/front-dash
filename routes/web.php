<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::prefix("front")->group(function () {
    Route::view('/home', 'themes.index')->name('home');
    Route::view('/about', 'themes.about')->name('about');
    Route::view('/contact', 'themes.contact')->name('contact');
    Route::view('/service', 'themes.service')->name('service');
});

Route::prefix(LaravelLocalization::setLocale() . "/admin")->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->name("admin.")->group(function () {

    Route::middleware('auth')->group(function () {
        Route::view('/', 'admin.dashboard.index')->name('index');
    });

    require __DIR__ . '/auth.php';
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
