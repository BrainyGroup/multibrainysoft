<?php

namespace App\Policies;

use App\Models\Employment_type;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class Employment_typePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        $locale = app()->getLocale();
        

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list employment_types')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employment_type $employment_type): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list employment_types', $employment_type)

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

        return $user->hasPermissionTo('create employment_types')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employment_type $employment_type): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('edit employment_types')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employment_type $employment_type): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('delete employment_types')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employment_type $employment_type): Response
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employment_type $employment_type): Response
    {
        //
    }
}
