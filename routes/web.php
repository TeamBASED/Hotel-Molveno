<?php

use App\Models\Room;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

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

// Breeze dashboard, will be replaced by user management pages
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User logged in
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // for now redirect, this should be home page
    Route::get('/', function () {
        return redirect(route('room.overview'));
    });

    // reservation routes
    Route::get('/reservation/{id}/info', [ReservationController::class, 'viewReservationInfo'])->name('reservation.info');
    Route::get('/reservation/{id}/edit', [ReservationController::class, 'viewReservationEdit'])->name('reservation.edit');
    Route::patch('/reservation/{id}/update', [ReservationController::class, 'handleUpdateReservation'])->name('reservation.update');
    Route::delete('/reservation/{id}/delete', [ReservationController::class, 'handleDeleteReservation'])->name('reservation.delete');


    // Room routes
    Route::get('/room/overview', [RoomController::class, 'viewRoomOverview'])->name('room.overview');
    Route::get('/room/{id}/info', [RoomController::class, 'viewRoomInfo'])->name('room.info');
    Route::get('/room/create', [RoomController::class, 'viewRoomCreate'])->name('room.create');
    Route::post('/room/store', [RoomController::class, 'handleCreateRoom'])->name('room.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'viewRoomEdit'])->name('room.edit');
    Route::patch('/room/{id}/update', [RoomController::class, 'handleUpdateRoom'])->name('room.update');
    Route::delete('/room/{id}/delete', [RoomController::class, 'handleDeleteRoom'])->name('room.delete');

    // Reservation routes
    Route::get('/reservation/create', [ReservationController::class, 'viewReservationCreate'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'handleCreateReservation'])->name('reservation.store');
});

// Reservation routes
Route::get('/reservation/overview', [ReservationController::class, 'viewReservationOverview'])->name('reservation.overview');

// User routes
Route::get('/user/overview', [UserController::class, 'viewUserOverview'])->name('user.overview');

require __DIR__.'/auth.php';
