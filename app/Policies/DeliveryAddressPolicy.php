<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\DeliveryAddress;

class DeliveryAddressPolicy
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
     public function destroy(User $user, DeliveryAddress $deliveryaddress)
    {
        $result = $user->id === $deliveryaddress->user_id;
        return $result;
    }

    public function edit(User $user, DeliveryAddress $deliveryaddress)
    {
        $result = $user->id === $deliveryaddress->user_id;
        return $result;
    }
}
