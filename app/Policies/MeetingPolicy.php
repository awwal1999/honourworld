<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Meeting;

class MeetingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can create meetings.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return (bool) $user->roles()->whereSlug('admin')->first();
    }
    
    /**
     * Determine if the given user can view meetings.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function view(User $user, Meeting $meeting)
    {
        return $user->category_id == $meeting->category_id;
    }
}
