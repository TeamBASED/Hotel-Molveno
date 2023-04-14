<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    public function viewUserOverview () {
        $users = User::getAllUserData();
        return view('user.overview', ['users' => $users]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::getAllRoleData();

        return view('auth.register', ['roles' => $roles]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'int'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        event(new Registered($user));

        // for now return to room overview
        
        // return redirect(RouteServiceProvider::HOME);

        return redirect(route('room.overview'));
    }
}
