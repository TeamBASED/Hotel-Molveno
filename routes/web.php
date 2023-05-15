<?php

use App\Http\Controllers\InvoiceController;
use App\Models\Room;
use App\Models\User;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CleaningStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// User logout
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// User logged in
Route::middleware('auth')->group(function () {
    // Users
    Route::get('/user/overview', [UserController::class, 'viewUserOverview'])->name('user.overview');
    Route::get('/user/register', [UserController::class, 'viewUserRegister'])->name('user.register');
    Route::post('/user/store', [UserController::class, 'handleUserRegister'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'viewUserEdit'])->name('user.edit');
    Route::patch('/user/{user}/update', [UserController::class, 'handleUserUpdate'])->name('user.update');
    Route::delete('/user/{id}/delete', [UserController::class, 'handleUserDelete'])->name('user.delete');

    // Home
    Route::get('/', [HomeController::class, 'handleViewHome'])->name('home');

    // reservations
    Route::get('/reservation/overview', [ReservationController::class, 'viewReservationOverview'])->name('reservation.overview');
    Route::get('/reservation/{id}/info', [ReservationController::class, 'viewReservationInfo'])->name('reservation.info');
    Route::get('/reservation/{id}/edit', [ReservationController::class, 'viewReservationEdit'])->name('reservation.edit');
    Route::get('/reservation/create', [ReservationController::class, 'viewReservationCreate'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'handleCreateReservation'])->name('reservation.store');
    Route::patch('/reservation/{id}/update', [ReservationController::class, 'handleUpdateReservation'])->name('reservation.update');
    Route::delete('/reservation/{id}/delete', [ReservationController::class, 'handleDeleteReservation'])->name('reservation.delete');

    // Invoices
    Route::get('/reservation/{reservation}/invoice/info', [InvoiceController::class, 'viewInvoiceInfo'])->name('invoice.info');

    // Guests
    Route::get('/reservation/{id}/guest/create', [GuestController::class, 'viewAddGuest', 'showContact' => '$showContact'])->name('guest.create');
    Route::post('/reservation/{id}/guest/store', [GuestController::class, 'handleCreateGuest'])->name('guest.store');
    Route::get('/reservation/{reservation}/guest/{guest}/edit', [GuestController::class, 'viewEditGuest'])->name('guest.edit');
    Route::patch('/reservation/{reservation}/guest/{guest}/update', [GuestController::class, 'handleUpdateGuest'])->name('guest.update');
    Route::delete('/reservation/{reservation}/guest/{guest}/delete', [GuestController::class, 'deleteGuest'])->name('guest.delete');

    // Cleaning
    Route::patch('/room/{id}/status', [CleaningStatusController::class, 'changeCleaningStatus'])->name('cleaning.status');

    // Rooms
    Route::get('/room/overview', [RoomController::class, 'viewRoomOverview'])->name('room.overview');
    Route::get('/room/{room}/info', [RoomController::class, 'viewRoomInfo'])->name('room.info');
    Route::get('/room/create', [RoomController::class, 'viewRoomCreate'])->name('room.create');
    Route::post('/room/store', [RoomController::class, 'handleCreateRoom'])->name('room.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'viewRoomEdit', 'notification' => '$notification'])->name('room.edit');
    Route::patch('/room/{id}/update', [RoomController::class, 'handleUpdateRoom'])->name('room.update');
    Route::delete('/room/{id}/delete', [RoomController::class, 'handleDeleteRoom'])->name('room.delete');

    // Contact
    Route::get('/reservation/{id}/contact', [ContactController::class, 'viewContactVerify'])->name('reservation.contact');
    Route::post('/reservation/verify', [ContactController::class, 'handleVerification'])->name('reservation.verify');
});

require __DIR__ . '/auth.php';