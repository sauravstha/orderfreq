<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Log;
use App\User;
use App\Home;

class HomesPolicy
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

    public function destroy(User $user, Home $home)
    {
        $result = $user->id === $home->user_id;
        log::info($result);
        return $result;
    }

    public function edit(User $user, Home $home)
    {
        $result = $user->id === $home->user_id;
        log::info($result);
        return $result;
    }
}
