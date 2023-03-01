<?php


namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(int $id){
        $room = Room::getRoomData($id);

        return view('/rooms/info', compact(['room']));
    }
}
