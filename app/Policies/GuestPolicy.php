<?php

namespace App\Policies;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuestPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Guest $guest) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Guest $guest) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Guest $guest) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "reception");
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Guest $guest) {
        //
    }
}