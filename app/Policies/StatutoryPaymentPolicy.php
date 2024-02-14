<?php

namespace App\Policies;

use App\Models\StatutoryPayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatutoryPaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        $locale = app()->getLocale();        

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list statutory_payments')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StatutoryPayment $statutoryPayment): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list statutory_payments', $statutory_payment)

        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('create statutory_payments')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StatutoryPayment $statutoryPayment): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('edit statutory_payments')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StatutoryPayment $statutoryPayment): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('delete statutory_payments')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StatutoryPayment $statutoryPayment): Response
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StatutoryPayment $statutoryPayment): Response
    {
        //
    }
}
