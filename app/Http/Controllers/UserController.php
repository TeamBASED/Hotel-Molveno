<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUserOverview () {
        $users = User::getAllUserData();

        return view('user.overview', ['users' => $users]);
    }
}
