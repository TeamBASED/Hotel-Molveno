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

    public function viewRoomEdit(int $id) {
        $roomTypes = RoomType::get();
        $roomViews = RoomView::get();
        $room = Room::getRoomData($id);

        return view('room.edit', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews, 'room' => $room]);
    }

    public function viewRoomCreate() {
        $roomTypes = RoomType::get();
        $roomViews = RoomView::get();
        
        return view('room.create', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
    }

    public function handleDeleteRoom(Request $request) {
        Room::deleteRoomData($request->id);
        return redirect(route('room.overview'));
    }

    public function createRoom(Request $request) {
        $room = Room::create([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'bed_configuration' => $request->configuration,
            'baby_bed_possible' => $request->babybed,
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type,
        ]);

        return redirect('/room/overview');
    }

    public function updateRoom(Request $request, int $id) {
        $room = Room::getRoomData($id);
        $room->update([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'bed_configuration' => $request->configuration,
            'baby_bed_possible' => $request->babybed,
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type
        ]);

        return redirect('/room/overview');
    }
}
