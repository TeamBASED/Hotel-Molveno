<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller {
    public function viewUserOverview() {
        $users = User::getAllUserData();

        return view('user.overview', ['users' => $users]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View {
        $roles = Role::getAllRoleData();

        return view('user.register', ['roles' => $roles]);
    }

    public function edit(int $userId): View {
        $user = User::getUserById($userId);
        $roles = Role::getAllRoleData();

        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse {
        $this->validateNewUser($request);

        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        event(new Registered($user));

        return redirect(route('user.overview'));
    }

    public function update(Request $request, User $user): RedirectResponse {
        $this->validateExistingUser($request, $user);

        $user->update([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'password' => ($user->password == $request->password) ? $request->password : Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        return redirect(route('user.overview'));
    }
    private function validateNewUser(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255|unique:' . User::class,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|confirmed', Rules\Password::defaults(),
            'role' => 'required|int',
        ]);
    }

    private function validateExistingUser(Request $request, User $user) {
        $request->validate([
            'username' => 'required|string|max:255', Rule::unique('users')->ignore($user),
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|confirmed', Rules\Password::defaults(),
            'role' => 'required|int',
        ]);
    }
}