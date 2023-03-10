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
Route::get('/room/create', [RoomController::class, 'viewRoomCreate'])->name('room.create');
Route::post('/room/create', [RoomController::class, 'handleCreateRoom']);
Route::get('/room/{id}/edit', [RoomController::class, 'viewRoomEdit'])->name('room.edit');
Route::patch('/room/{id}/update', [RoomController::class, 'handleUpdateRoom'])->name('room.update');
Route::delete('/room/{id}/delete', [RoomController::class, 'handleDeleteRoom'])->name('room.delete');

require __DIR__.'/auth.php';
