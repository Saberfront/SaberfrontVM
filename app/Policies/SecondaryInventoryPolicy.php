<?php

namespace Saberfront\Policies;

use Saberfront\User;
use Saberfront\SecondaryInventory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecondaryInventoryPolicy
{
    //use HandlesAuthorization;

    /**
     * Determine whether the user can view the secondaryInventory.
     *
     * @param  \Saberfront\User  $user
     * @param  \Saberfront\SecondaryInventory  $secondaryInventory
     * @return mixed
     */
    public function view(User $user, SecondaryInventory $secondaryInventory)
    {
        ///return $user->robloxUserId == $secondaryInventory->userId  && $user->tankInventoryId == $secondaryInventory->id;
    }

    /**
     * Determine whether the user can create secondaryInventories.
     *
     * @param  \Saberfront\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return $user->active;
    }

    /**
     * Determine whether the user can update the secondaryInventory.
     *
     * @param  \Saberfront\User  $user
     * @param  \Saberfront\SecondaryInventory  $secondaryInventory
     * @return mixed
     */
    public function update(User $user, SecondaryInventory $secondaryInventory)
    {
        return $user->active;
    }

    /**
     * Determine whether the user can delete the secondaryInventory.
     *
     * @param  \Saberfront\User  $user
     * @param  \Saberfront\SecondaryInventory  $secondaryInventory
     * @return mixed
     */
    public function delete(User $user, SecondaryInventory $secondaryInventory)
    {
        return $user->active;
    }
}
