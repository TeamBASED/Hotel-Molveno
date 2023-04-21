<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public static function viewHome(Request $request) {

        switch ($request->action) {
            case 'viewRooms':

                return view("room.overview", ['request' => $request]);
            case 'makeReservation':
                return view("reservation.create");

            default:
                return view("home");

        }
    }
}