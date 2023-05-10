<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class CleaningStatusController extends Controller {
    public function changeCleaningStatus(Request $request, int $roomId) {
        $room = Room::getRoomData($roomId);
        $room->update([
            'cleaning_status_id' => $request->cleaning_status
        ]);

        return redirect(route('room.overview'));
    }
}