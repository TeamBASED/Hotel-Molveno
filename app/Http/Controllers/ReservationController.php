<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function viewReservationCreate(Request $request) : View{
        $room_id = $request->roomId;
        $room = Room::getRoomData($room_id);

        return view('reservation.create', ['room' => $room]);
    }
}
