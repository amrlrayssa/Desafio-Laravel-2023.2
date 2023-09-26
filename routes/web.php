<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

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
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->can('isAdmin', '\App\Models\User');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->can('isAdmin', '\App\Models\User');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->can('isAdmin', '\App\Models\User');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->can('isAdmin', '\App\Models\User');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->can('isAdmin', '\App\Models\User');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->can('isAdmin', '\App\Models\User');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->can('isAdmin', '\App\Models\User');
Route::resource('owners', OwnerController::class)->except(['create', 'edit']);
Route::resource('animals', AnimalController::class)->except(['create', 'edit']);
Route::resource('consultations', ConsultationController::class)->except(['create', 'edit']);

Route::get('/pdf', [PdfController::class, 'index'])->name('index');
Route::get('/email', [MailController::class, 'index'])->name('mail.index');
Route::post('/email', [MailController::class, 'store'])->name('mail.index');

require __DIR__ . '/auth.php';
