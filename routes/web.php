<?php

use App\Models\Room;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;

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

// Breeze stuff

Route::get('room/create', function () {
    return view('room/create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// for now redirect, this should be home page
Route::get('/', function () {
    return redirect(route('room.overview'));
});

// Room routes

Route::get('/room/overview', [RoomController::class, 'viewRoomOverview'])->name('room.overview');

Route::get('/room/{id}/info', [RoomController::class, 'viewRoomInfo'])->name('room.info');



require __DIR__.'/auth.php';
