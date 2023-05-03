<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

class HomeController extends Controller {
    public static function viewHome(Request $request) {

        switch ($request->action) {
            case 'viewRooms':
                $roomController = new RoomController;
                return $roomController->viewRoomOverview($request);

            case 'makeReservation':
                $room = Room::getRoomData($request->selectedRoom);
                return view("reservation.create", ["new_contact" => null, "contact" => null, "room" => $room]);

            default:
                $allRooms = Room::getAllRoomData();
                return view("home", ["allRooms" => $allRooms]);
        }
    }

}