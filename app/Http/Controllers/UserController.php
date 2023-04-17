<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function viewUserOverview(Request $request) {
        if ($request->user()->can('viewAny', User::class)) {
            $users = User::getAllUserData();
            return view('user.overview', ['users' => $users]);
        } else {
            //TODO: redirect toevoegen.
            echo ("Deze pagina is niet beschikbaar");
        }
    }
}