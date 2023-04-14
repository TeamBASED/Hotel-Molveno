<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUserOverview (Request $request) {
        if ($request->user()->can('viewAny', Room::class)) {
            $users = User::getAllUserData();
            return view('user.overview', ['users' => $users]);
        } else {
            echo("Deze pagina is niet beschikbaar");
        }
    }
}
