<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user) {
        $title = $user->role->title;
        return ($title === "owner" || $title === "hotel manager" || $title === "head-housekeeping" || $title === "housekeeping" || $title === "reception");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Reservation $reservation) {
        $title = $user->role->title;
        return ($title === "owner" || $title === "hotel manager" || $title === "head-housekeeping" || $title === "housekeeping" || $title === "reception");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Reservation $reservation) {
        $title = $user->role->title;
        return ($title === "owner" || $title === "hotel manager" || $title === "reception");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reservation $reservation) {
        $title = $user->role->title;
        return ($title === "owner" || $title === "hotel manager" || $title === "reception");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reservation $reservation) {
        $title = $user->role->title;
        return ($title === "owner" || $title === "hotel manager" || $title === "reception");
    }
}