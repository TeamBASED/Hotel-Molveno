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

    public function createRoom() : Room {
        $room = Room::create([
            'room_number' => $room_number,
            'room_type_id' => $room_type_id, 
            'capacity' => $capacity,
            'base_price_per_night' => $base_price_per_night ,
            'baby_bed_possible' => $baby_bed_possible,
            'room_view_id' => $room_view_id,
            'bed_configuration' => $bed_configuration,
            'description' => $description
        ]);
        $room->save();

        return redirect('/room/overview');
    }
}
