<?php

namespace App\Policies;

use App\Models\Pay;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PayPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list pays')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pay $pay): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list pays', $pay)

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

        return $user->hasPermissionTo('create pays')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pay $pay): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('edit pays')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pay $pay): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('delete pays')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pay $pay): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pay $pay): bool
    {
        //
    }
}
