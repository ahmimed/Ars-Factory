<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/fr');
});

Route::get('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['fr', 'en'], true), 404);
    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware(SetLocale::class)
    ->group(function (): void {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/services', [PageController::class, 'services'])->name('services');
        Route::get('/projects', [PageController::class, 'projects'])->name('projects');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

        Route::middleware('guest')->group(function (): void {
            Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
            Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
        });

        Route::middleware('auth')->group(function (): void {
            Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::post('/admin/images', [DashboardController::class, 'store'])->name('admin.images.store');
            Route::delete('/admin/images/{image}', [DashboardController::class, 'destroy'])->name('admin.images.destroy');
            Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');
        });
    });
