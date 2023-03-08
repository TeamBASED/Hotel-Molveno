<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomView;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function viewRoomInfo(int $id){
        $room = Room::getRoomData($id);

        return view('/room/info', ['room' => $room]);
    }

    public function viewRoomOverview() {
        $rooms = Room::getAllRoomData();

        return view('/room/overview', ['rooms' => $rooms]);
    }

    public function viewRoomEdit() {
        $roomTypes = RoomType::pluck("type");
        $roomViews = RoomView::pluck("type");
        
        return view('/room/edit', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
    }

    public function viewRoomCreate() {
        $roomTypes = RoomType::pluck("type");
        $roomViews = RoomView::pluck("type");
        
        return view('/room/create', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
    }


}
