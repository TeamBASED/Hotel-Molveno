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
    public function handleViewUserOverview(Request $request) {
        if ($request->user()->can('viewAny', User::class)) {

            $roles = Role::getAllRoleData();
            $users = isset($request->column)
                ? User::getAllUsersSorted($request->column, $request->order)
                : $this->filterUserResults($request);
            return view('user.overview', ['users' => $users, 'roles' => $roles]);
        } else {
            return view('home');
        }
    }

    public static function isPasswordCorrect(string $password): bool {
        return Hash::check($password, Auth::user()->password);
    }

    /**
     * Display the registration view.
     */
    public function viewUserRegister(Request $request) {
        if ($request->user()->can('create', User::class)) {
            $roles = Role::getAllRoleData();
            return view('user.register', ['roles' => $roles]);
        } else {
            return redirect(route('user.overview'));
        }
    }

    public function viewUserEdit(User $user, Request $request) {
        if ($request->user()->can('update', $user)) {
            $roles = Role::getAllRoleData();
            return view('user.edit', ['user' => $user, 'roles' => $roles]);
        } else {
            return redirect(route('user.overview'));
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function handleUserRegister(Request $request): RedirectResponse {
        $request->validate([
            'username' => 'required|string|max:255|unique:' . User::class,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed', Rules\Password::defaults(),
            'role' => 'required|int',
        ]);
        $user = $this->userRegister($request);

        event(new Registered($user));

        return redirect(route('user.overview'));
    }

    private function userRegister(Request $request) {
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        return $user;
    }

    public function handleUserUpdate(Request $request, User $user): RedirectResponse {
        $request->validate([
            'username' => 'required|string|max:255', Rule::unique('users')->ignore($user),
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed', Rules\Password::defaults(),
            'role' => 'required|int',
        ]);

        $this->userUpdate($request, $user);

        return redirect(route('user.overview'));
    }

    private function userUpdate(Request $request, User $user) {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'password' => ($request->password) ? Hash::make($request->password) : $user->password,
            'role_id' => $request->role,
        ]);
    }

    public function userDelete(User $user) {
        $user->delete();
    }

    public function handleUserDelete(Request $request): RedirectResponse {
        $user = User::getUserById($request->id);

        if (UserController::isPasswordCorrect($request->password) && $user->role->id != 1) {
            $user->delete();
            return redirect(route('user.overview', ['notification' => 'User successfully deleted']));
        } else {
            return redirect(route('user.edit', ['user' => $user->id, 'notification' => 'Deletion unsuccessful']));
        }
    }

    private function filterUserResults(Request $request) {
        $filterQuery = User::with(['role']);

        if ($this->hasFilter($request->username))
            $filterQuery->withUsername($request->username);
        if ($this->hasFilter($request->first_name))
            $filterQuery->withFirstName($request->first_name);
        if ($this->hasFilter($request->last_name))
            $filterQuery->withLastName($request->last_name);
        if ($this->hasFilter($request->role))
            $filterQuery->withUserRole($request->role);

        $users = $filterQuery->get();
        return $users;
    }

    private function hasFilter($param) {
        return $param != "";
    }

}