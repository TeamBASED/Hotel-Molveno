<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestReservation;

class GuestReservationController extends Controller {
    public function storeGuestReservation(Request $request) {
        $guestReservation = GuestReservation::create([
            'reservation_id'->request->reservation_id,
            'guest_id'->request->guest_id,
        ]);
    }

    public function handleRemoveGuestFromReservation(Request $request) {
        $reservationId = $request->reservationId;
        $guestId = $request->guestId;
        GuestReservation::removeGuestFromReservation($reservationId, $guestId);
        return redirect(route('reservation.overview'));
    }

}