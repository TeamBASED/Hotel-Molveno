<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationOverview() {
        $rooms = Room::getAllRoomData();

        return view('reservation.overview', ['rooms' => $rooms]);
    }
}
