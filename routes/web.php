<?php

use App\Http\Controllers\PersonneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YoloControler;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post('/dashboard')->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('yolo', [YoloControler::class, 'publicView']);
Route::get('yolo-connected', [YoloControler::class, 'privateView'])->middleware(['auth'])->name('yoloPrivate');

Route::get('glowUpAsAdmin', [YoloControler::class, 'glowUpAsAdmin'])->middleware(['auth'])->name('glowUpAsAdmin');

Route::get('personne/{personne}', [PersonneController::class, 'show']);

Route::get('roles', [YoloControler::class, 'roles'])->middleware(['auth'])->name('roles');

require __DIR__ . '/auth.php';
