<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    static public function viewAny(User $user)
    {
        $title = $user->role->title;

        if ($title === "owner" || 
            $title === "hotel manager" ||
            $title === "head-housekeeping" ||
            $title === "housekeeping" ||
            $title === "reception") {
                return true;
            } 
            else {
                return false;
            }
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Room $room)
    {
        if ($title === "owner" || 
            $title === "hotel manager" ||
            $title === "head-housekeeping" ||
            $title === "housekeeping" ||
            $title === "reception") {
                return $title;
            }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Room $room)
    {
        if ($title === "owner" || 
            $title === "hotel manager") {
                return $title;
            }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Room $room)
    {
        // dd($user->role);
        if ($title === "owner" || 
            $title === "hotel manager") {
                return $title;
            }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Room $room)
    {
        if ($title === "owner" || 
            $title === "hotel manager") {
                return $title;
            }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Room $room)
    {
        if ($title === "owner" || 
            $title === "hotel manager") {
                return $title;
            }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Room $room)
    {
        //
    }
}