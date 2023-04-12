<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
        return $user->role->title === "head-housekeeping";
        return $user->role->title === "housekeeping";
        return $user->role->title === "reception";
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Reservation $reservation)
    {
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
        return $user->role->title === "head-housekeeping";
        return $user->role->title === "housekeeping";
        return $user->role->title === "reception";
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Room $room)
    {
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reservation $reservation)
    {
        // dd($user->role);
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reservation $reservation)
    {
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Reservation $reservation)
    {
        return $user->role->title === "owner";
        return $user->role->title === "hotel manager";
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, reservation $reservation)
    {
        //
    }
}
