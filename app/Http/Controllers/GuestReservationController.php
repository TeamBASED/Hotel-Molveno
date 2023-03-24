<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestReservation;

class GuestReservationController extends Controller
{
    //functie om een nieuwe row te maken om een guest aan een reservering te koppelen

    public function handleRemoveGuestFromReservation() {
        $reservationId = $request->reservationId;
        $guestId = $request->guestId;
        GuestReservation::removeGuestFromReservation($reservationId, $guestId);
        return redirect(route('reservation.overview'));
    }

}
