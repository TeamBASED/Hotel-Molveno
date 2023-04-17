<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function viewUserOverview() {
        $users = User::getAllUserData();
        return view('user.overview', ['users' => $users]);
    }


    public static function isPasswordCorrect(string $password): bool {
        return Hash::check($password, Auth::user()->password);
    }
}