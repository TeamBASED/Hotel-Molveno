<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationOverview() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.overview', ['reservations' => $reservations]);
    }

    public function viewReservationInfo() {
        $reservations = Reservation::getAllReservationData();

        return view('reservation.info', ['reservations' => $reservations]);
    }
}
