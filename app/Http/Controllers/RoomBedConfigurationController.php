<?php

namespace App\Http\Controllers;

use App\Models\BedConfiguration;
use App\Models\RoomBedConfiguration;
use Illuminate\Http\Request;

class RoomBedConfigurationController extends Controller
{
    public function createBedConfigurationForRoom($roomId, $request) {
        if($request->singleBeds > 0) {
            $this->createRoomBedConfiguration(
                $roomId,
                BedConfiguration::getIdByConfiguration('single'),
                $request->singleBeds
            );
        }

        if($request->doubleBeds > 0) {
            $this->createRoomBedConfiguration(
                $roomId,
                BedConfiguration::getIdByConfiguration('double'),
                $request->doubleBeds
            );
        }
    }

    public function updateBedConfigurationForRoom($roomId, $request) {
        // TODO: if no changes to bed config made, stop this function.
        
        $this->deleteBedConfigurationForRoom($roomId);
        $this->createBedConfigurationForRoom($roomId, $request);
    }

    public function deleteBedConfigurationForRoom($roomId) {
        RoomBedConfiguration::where('room_id', $roomId)->delete();
    }

    public function getAmountOfBedConfiguration($roomId, $configuration) {
        $foundBedConfiguration = RoomBedConfiguration::getByForeignIds($roomId, BedConfiguration::getIdByConfiguration($configuration));
        return (
            $foundBedConfiguration != null ?
            $foundBedConfiguration->amount :
            0
        );
    }

    private function createRoomBedConfiguration($roomId, $configurationId, $amount) {
        RoomBedConfiguration::create([
            'room_id' => $roomId,
            'bed_configuration_id' => $configurationId,
            'amount' => $amount,
        ]);
    }
}
