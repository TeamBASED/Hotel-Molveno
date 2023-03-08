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

        return view('room.info', ['room' => $room]);
    }

    public function viewRoomOverview() {
        $rooms = Room::getAllRoomData();

        return view('room.overview', ['rooms' => $rooms]);
    }

    public function createRoom() {
        $room = Room::create([
            'room_number' => $room_number,
            'capacity' => $capacity,
            'base_price_per_night' => $base_price_per_night,
            'bed_configuration' => $bed_configuration,
            'baby_bed_possible' => $baby_bed_possible,
            'description' => $description,
            'room_view_id' => $room_view,
            'room_type_id' => $room_type
        ]);
        $room->save();

        return redirect('/room/overview');
    }
    public function updateRoom(Request $request, int $id) {
        $room = Room::getRoomData($id);
        $room->update([
            'room_number' => $request->room_number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->base_price_per_night,
            'bed_configuration' => $request->bed_configuration,
            'baby_bed_possible' => $request->baby_bed_possible,
            'description' => $request->description,
            'room_view_id' => $request->room_view,
            'room_type_id' => $request->room_type
        ]);

        return redirect('/room/overview');
    }

    public function viewRoomEdit() {
        $roomTypes = RoomType::pluck("type");
        $roomViews = RoomView::pluck("type");
        
        return view('room.edit', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
    }

    public function viewRoomCreate() {
        $roomTypes = RoomType::pluck("type");
        $roomViews = RoomView::pluck("type");
        
        return view('room.create', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
    }


}
