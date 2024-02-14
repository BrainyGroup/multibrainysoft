<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMainController;
use App\Http\Controllers\TenantController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $locale = app()->getLocale();

    $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    return Inertia::render('Welcome', [
        'translations' => $translations,
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('home');


Route::get('/dashboard', function () {
    
    $locale = app()->getLocale();

    $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    return Inertia::render('MainDashboard', compact('translations'));
})->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'roles' => RoleController::class,
        'tenants' => TenantController::class,
        'users' => UserMainController::class,
    ]);
});

require __DIR__.'/auth.php';
