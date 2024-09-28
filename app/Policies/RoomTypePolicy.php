<?php

namespace App\Policies;

use App\Models\RoomType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomTypePolicy
{
    /**
     * Determine if the user can view any room types.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view roomtype');
    }

    /**
     * Determine if the user can view a specific room type.
     */
    public function view(User $user, RoomType $roomType)
    {
        return $user->hasPermissionTo('view roomtype');
    }

    /**
     * Determine if the user can create a room type.
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create roomtype');
    }

    /**
     * Determine if the user can update a room type.
     */
    public function update(User $user, RoomType $roomType)
    {
        return $user->hasPermissionTo('update roomtype');
    }

    /**
     * Determine if the user can delete a room type.
     */
    public function delete(User $user, RoomType $roomType)
    {
        return $user->hasPermissionTo('delete roomtype');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RoomType $roomType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RoomType $roomType)
    {
        //
    }
}
