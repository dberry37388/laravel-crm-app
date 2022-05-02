<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
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
     * @param Company $company
     * @return bool
     */
    public function view(User $user, Company $company): bool
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
        $user->ownsTeam($user->current_team_id);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function update(User $user, Company $company): bool
    {
        return $user->ownsTeam($company->team_id) || $user->id === $company->assigned_to_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function delete(User $user, Company $company): bool
    {
        return $user->ownsTeam($company->team_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function restore(User $user, Company $company): bool
    {
        return $user->ownsTeam($company->team_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function forceDelete(User $user, Company $company): bool
    {
        //
    }
}
