<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\RoomView;
use App\Policies\RoomPolicy;
use Illuminate\Http\Request;
use App\Models\BedConfiguration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\UserController;

class RoomController extends Controller {

    public function viewRoomInfo(int $id, Request $request) {
        if ($request->user()->can('viewAny', Room::class)) {
            $room = Room::getRoomData($id);
            return view('room.info', ['room' => $room]);
        } else {
            return redirect(route('room.overview'));
        }
    }

    public function viewRoomOverview(Request $request) {
        if ($request->user()->can('viewAny', Room::class)) {
            $rooms = $this->filterRoomResults($request);
            $roomTypes = RoomType::get();
            $roomViews = RoomView::get();
            return view('room.overview', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews, 'rooms' => $rooms]);
        } else {
            // TODO: Redirect to homepage
            echo 'This page is unavailable';
        }
    }

    public function viewRoomEdit(int $id, Request $request) {
        if ($request->user()->can('update', Room::class)) {

            $roomTypes = RoomType::get();
            $roomViews = RoomView::get();
            $room = Room::getRoomData($id);

            $bedConfigController = new RoomBedConfigurationController();
            $singleBeds = $bedConfigController->getAmountOfBedConfiguration($id, 'single');
            $doubleBeds = $bedConfigController->getAmountOfBedConfiguration($id, 'double');

            return view('room.edit', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews, 'room' => $room, 'singleBeds' => $singleBeds, 'doubleBeds' => $doubleBeds]);
        } else {
            return redirect(route('room.info', $id));
        }
    }

    public function viewRoomCreate(Request $request) {
        if ($request->user()->can('create', Room::class)) {
            $roomTypes = RoomType::get();
            $roomViews = RoomView::get();
            return view('room.create', ['roomTypes' => $roomTypes, 'roomViews' => $roomViews]);
        } else {
            return redirect(route('room.overview'));
        }
    }

    public function handleCreateRoom(Request $request) {
        $validated = $request->validate([
            'number' => 'required|string',
            'capacity' => 'required|numeric',
            'price' => 'required',
            'singleBeds' => 'required|integer',
            'doubleBeds' => 'required|integer',
            'view' => 'required',
            'type' => 'required'
        ]);

        $this->storeRoom($request);
        return redirect(route('room.overview'));
    }

    public function handleUpdateRoom(Room $room, Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'number' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'singleBeds' => 'required|integer',
            'doubleBeds' => 'required|integer',
            'view' => 'required',
            'type' => 'required'
        ]);

        $this->updateRoom($request, $request->id);
        return redirect(route('room.overview'));
    }

    public function handleDeleteRoom(Request $request) {

        if (UserController::isPasswordCorrect($request->password)) {
            $roomNumber = Room::getRoomData($request->id)->room_number;
            Room::deleteRoomData($request->id);
            (new RoomBedConfigurationController())->deleteBedConfigurationForRoom($request->id);
            return redirect(route('room.overview', ['notification' => "Room $roomNumber is deleted"]));

        } else {

            return redirect(route('room.edit', ['id' => $request->id, 'notification' => 'The room is not removed']));

        }

    }

    public function storeRoom(Request $request) {
        $room = Room::create([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'baby_bed_possible' => isset($request->babybed),
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type,
        ]);

        (new RoomBedConfigurationController())->createBedConfigurationForRoom($room->id, $request);
    }

    public function updateRoom(Request $request, int $id) {
        $room = Room::getRoomData($id);
        $room->update([
            'room_number' => $request->number,
            'capacity' => $request->capacity,
            'base_price_per_night' => $request->price,
            'baby_bed_possible' => isset($request->babybed),
            'description' => $request->description,
            'room_view_id' => $request->view,
            'room_type_id' => $request->type
        ]);

        (new RoomBedConfigurationController())->updateBedConfigurationForRoom($room->id, $request);
    }

    private function filterRoomResults(Request $request) {
        $filterQuery = Room::with(['cleaningStatus', 'roomView', 'roomType', 'bedConfigurations']);

        if ($this->hasFilter($request->capacity))
            $filterQuery->withCapacity($request->capacity);
        if ($this->hasFilter($request->number))
            $filterQuery->withNumber($request->number);
        if ($this->hasFilter($request->type))
            $filterQuery->withRoomType($request->type);
        if ($this->hasFilter($request->view))
            $filterQuery->withRoomView($request->view);
        if ($this->hasFilter($request->singleBed))
            $filterQuery->withBedConfiguration(1, $request->singleBed);
        if ($this->hasFilter($request->doubleBed))
            $filterQuery->withBedConfiguration(2, $request->doubleBed);
        if (isset($request->babybed))
            $filterQuery->withBabybed(1);

        return $filterQuery->get();
    }

    private function hasFilter($param) {
        return $param != "";
    }
}