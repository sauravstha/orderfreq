<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Log;
use App\User;
use App\Orderlist;
use App\OrderlistProduct;

class OrderlistPolicy
{
    // use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user, Orderlist $orderlist)
    {
        return $result = $user->id === $orderlist->home->user_id;
    }

    public function destroy(User $user, Orderlist $orderlist)
    {
        return $user->id === $orderlist->home->user_id;
    }

    public function view(User $user, Orderlist $orderlist)
    {
        return $user->id === $orderlist->home->user_id;
    }

    public function edit(User $user, Orderlist $orderlist)
    {
        return $user->id === $orderlist->home->user_id;
    }
}
