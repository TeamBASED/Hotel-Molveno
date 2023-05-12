<?php

namespace App\Policies;

use App\Models\CleaningStatus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CleaningStatusPolicy {
    use HandlesAuthorization;

    public function update(User $user) {
        $title = $user->role->title;
        return ($title === "owner" ||
            $title === "hotel manager" ||
            $title === "head-housekeeping" ||
            $title === "reception");
    }
}