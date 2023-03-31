<?php

namespace App\Http\Controllers;

use App\Models\RoomBedConfiguration;
use Illuminate\Http\Request;

class RoomBedConfigurationController extends Controller
{
    public function createBedConfigurationForRoom($roomId, $request) {
        if($request->singleBeds > 0) {
            $this->createRoomBedConfiguration($roomId, 1, $request->singleBeds);
        }

        if($request->doubleBeds > 0) {
            $this->createRoomBedConfiguration($roomId, 2, $request->doubleBeds);
        }
    }

    public function createRoomBedConfiguration($roomId, $configurationId, $amount) {
        RoomBedConfiguration::create([
            'room_id' => $roomId,
            'bed_configuration_id' => $configurationId,
            'amount' => $amount,
        ]);
    }
}
