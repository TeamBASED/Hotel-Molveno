<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function viewRoomInfo(int $id){
        $room = Room::getRoomData($id);

        return view('room.info', ['room' => $room]);
    }

    public function viewRoomOverview() {
        $rooms = Room::getAllRoomData();

        return view('room.overview', ['rooms' => $rooms]);
    }

    public function createRoom(){
        $room = new Room();
        $room->room_number = request('room_number');
        $room->roomType->type = request('type');
        $room->capacity = request('capacity');
        $room->base_price_per_night = request('base_price_per_night');
        $room->roomView->type = request('view');
        $room->bed_configuration = request('bed_configuration');
        $room->description = request('description');
        $room->save();

        return redirect('/room/overview');
    }
}
