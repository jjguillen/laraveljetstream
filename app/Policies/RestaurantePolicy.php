<?php

namespace App\Policies;

use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RestaurantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurante  $restaurante
     * @return mixed
     */
    public function view(User $user, Restaurante $restaurante)
    {
        return $user->id === $restaurante->user_id || $user->role->role== 'admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurante  $restaurante
     * @return mixed
     */
    public function update(User $user, Restaurante $restaurante)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurante  $restaurante
     * @return mixed
     */
    public function delete(User $user, Restaurante $restaurante)
    {
        return $user->id === $restaurante->user_id  || $user->role->role== 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurante  $restaurante
     * @return mixed
     */
    public function restore(User $user, Restaurante $restaurante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Restaurante  $restaurante
     * @return mixed
     */
    public function forceDelete(User $user, Restaurante $restaurante)
    {
        //
    }
}
