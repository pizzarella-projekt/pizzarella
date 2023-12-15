<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
    return Inertia::render('Home');
});
Route::get('/aktualnosci', function () {
    return Inertia::render('Aktualnosci');
});
Route::get('/menu', function () {
    return Inertia::render('Menu');
});
Route::get('/menu/{id}', function () {
    return Inertia::render('Produkt');
});
Route::get('/galeria', function () {
    $files = Storage::disk('public')->allFiles('gallery');
    return Inertia::render('Galeria', ['images' => $files]);
});
Route::get('/kontakt', function () {
    return Inertia::render('Kontakt');
});

Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->where('photo', '.*')->name('photos.destroy');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::redirect('/', '/admin/menu');
    Route::get('/menu', function () {
        return Inertia::render('Admin/Menu');
    });
    Route::get('/aktualnosci', function () {
        return Inertia::render('Admin/Aktualnosci');
    });
    Route::get('/zamowienia', function () {
        return Inertia::render('Admin/Zamowienia');
    });
    Route::get('/galeria', function () {
        $files = Storage::disk('public')->allFiles('gallery');
        return Inertia::render('Admin/Galeria', ['images' => $files]);
    })->name('admin.galeria');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
