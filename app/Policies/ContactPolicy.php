<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Contact $contact
     * @return bool
     */
    public function view(User $user, Contact $contact): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
       return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Contact $contact
     * @return bool
     */
    public function update(User $user, Contact $contact): bool
    {
        return $user->ownsTeam($user->current_team_id) || $user->id === $contact->assigned_to;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Contact $contact
     * @return bool
     */
    public function delete(User $user, Contact $contact): bool
    {
        return $user->ownsTeam($user->current_team_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Contact $contact
     * @return bool
     */
    public function restore(User $user, Contact $contact): bool
    {
        return $user->ownsTeam($user->current_team_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Contact $contact
     * @return bool
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        //
    }
}
