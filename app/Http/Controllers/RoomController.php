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

    public function viewRoomOverview(Request $request) {
        $rooms = $this->filterRoomResults($request);

        $roomTypes = RoomType::get();
        $roomViews = RoomView::get();

        return view('room.overview', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews, 'rooms' => $rooms]);
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

    public function handleCreateRoom(Request $request) {
        $validated = $request->validate([
            'number' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'configuration' => 'required',
            'view' => 'required',
            'type' => 'required'
        ]);

        $this->storeRoom($request);
        return redirect(route('room.overview'));
    }

    public function handleUpdateRoom(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'number' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'configuration' => 'required',
            'view' => 'required',
            'type' => 'required'
        ]);

        $this->updateRoom($request, $request->id);
        return redirect(route('room.overview'));
    }

    public function handleDeleteRoom(Request $request) {
        Room::deleteRoomData($request->id);
        return redirect(route('room.overview'));
    }

    public function storeRoom(Request $request) {
        $room = Room::create([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'bed_configuration' => $request->configuration,
            'baby_bed_possible' => isset($request->babybed),
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type,
        ]);
    }

    public function updateRoom(Request $request, int $id) {
        $room = Room::getRoomData($id);
        $room->update([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'bed_configuration' => $request->configuration,
            'baby_bed_possible' => isset($request->babybed),
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type
        ]);
    }

    private function filterRoomResults(Request $request) {
        $filterQuery = Room::with(['cleaningStatus','roomView','roomType']);

        if($this->hasFilter($request->capacity)) $filterQuery->withCapacity($request->capacity);
        if($this->hasFilter($request->number)) $filterQuery->withNumber($request->number);
        if($this->hasFilter($request->type)) $filterQuery->withRoomType($request->type);
        if($this->hasFilter($request->view)) $filterQuery->withRoomView($request->view);
        if($this->hasFilter($request->bedConfig)) $filterQuery->withBedConfiguration($request->bedConfig);
        if(isset($request->babybed)) $filterQuery->withBabybed(1);

        return $filterQuery->get();
    }

    private function hasFilter($param) {
        return $param != "";
    }
}
