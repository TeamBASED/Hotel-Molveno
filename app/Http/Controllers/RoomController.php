<?php


namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Temporary function for testing info page
    public function viewRoomInfo(int $id){
        $room = Room::getRoomData($id);

        return view('/room/info', compact(['room']));
    }

    public function viewRoomOverview() {
        $rooms = Room::getAllRoomData();

        return view('/room/overview', ['rooms' => $rooms]);
    }
}
