<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

class HomeController extends Controller {
    public static function handleViewHome(Request $request) {

        switch ($request->action) {
            case 'viewRooms':
                $roomController = new RoomController;
                return $roomController->viewRoomOverview($request);

            case 'makeReservation':
                return view("reservation.contact", ["roomId" => $request->selectedRoom,
                    'request' => $request,
                ]);

            default:
                $allRooms = Room::getAllRoomData();
                return view("home", ["allRooms" => $allRooms]);
        }
    }

}