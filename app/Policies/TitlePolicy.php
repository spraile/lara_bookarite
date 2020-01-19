<?php

namespace App\Policies;

use App\Title;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TitlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any titles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the title.
     *
     * @param  \App\User  $user
     * @param  \App\Title  $title
     * @return mixed
     */
    public function view(User $user, Title $title)
    {

    }

    /**
     * Determine whether the user can create titles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === 1;

    }

    /**
     * Determine whether the user can update the title.
     *
     * @param  \App\User  $user
     * @param  \App\Title  $title
     * @return mixed
     */
    public function update(User $user, Title $title)
    {
        return $user->role_id === 1;

    }

    /**
     * Determine whether the user can delete the title.
     *
     * @param  \App\User  $user
     * @param  \App\Title  $title
     * @return mixed
     */
    public function delete(User $user, Title $title)
    {
        return $user->role_id === 1;

    }

    /**
     * Determine whether the user can restore the title.
     *
     * @param  \App\User  $user
     * @param  \App\Title  $title
     * @return mixed
     */
    public function restore(User $user, Title $title)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the title.
     *
     * @param  \App\User  $user
     * @param  \App\Title  $title
     * @return mixed
     */
    public function forceDelete(User $user, Title $title)
    {
        //
    }
}
