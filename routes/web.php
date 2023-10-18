<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-proccess');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/register-proccess', [AuthController::class, 'register'])->name('register-proccess');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/projects/create/{id}', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projects/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/contact_type', [ContactTypeController::class, 'index'])->name('contact_type.index');
    Route::get('/contact_type/create', [ContactTypeController::class, 'create'])->name('contact_type.create');
    Route::post('/contact_type/store', [ContactTypeController::class, 'store'])->name('contact_type.store');
    Route::get('/contact_type/{id}/edit', [ContactTypeController::class, 'edit'])->name('contact_type.edit');
    Route::put('/contact_type/{id}', [ContactTypeController::class, 'update'])->name('contact_type.update');
    Route::delete('/contact_type/{id}', [ContactTypeController::class, 'destroy'])->name('contact_type.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
   
});