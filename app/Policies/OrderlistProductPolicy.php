<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\OrderlistProduct;
use Log;

class OrderlistProductPolicy
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

    public function editOrderlistProduct(User $user, OrderlistProduct $orderlistProduct)
    {
        return $user->id === $orderlistProduct->orderlist->home->user_id;
    }

    public function deleteOrderlistProduct(User $user, OrderlistProduct $orderlistProduct)
    {
        return $user->id === $orderlistProduct->orderlist->home->user_id;
    }
}
