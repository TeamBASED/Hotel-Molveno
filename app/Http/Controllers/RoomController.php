<?php


namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function viewRoomInfo(int $id){
        $room = Room::getRoomData($id);

        return view('/room/info', compact(['room']));
    }
}
