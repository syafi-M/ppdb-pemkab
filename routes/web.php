<?php

use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tahun' => Carbon\Carbon::now()->format('Y')
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/siswa', SiswaController::class)->only('create','store','index');
});
Route::middleware('auth', 'admin')->prefix('admin')->group(function (){
    Route::resource('siswa', SiswaController::class)->name('index','admin.siswa.index');
    Route::resource('jurusan', JurusanController::class);
    Route::patch('/daftar-ulang/{id}', [SiswaController::class, 'daftarUlang'])->name('daftar.ulang');
});

require __DIR__.'/auth.php';
