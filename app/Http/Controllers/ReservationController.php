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

    public function viewReservationInfo(int $id) {
        $reservations = Reservation::getAllReservationData($id);

        return view('reservation.info', ['reservations' => $reservations]);
    }
}
