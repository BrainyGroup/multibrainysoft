<?php

namespace App\Policies;

use App\Models\Pay_base;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class Pay_basePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        $locale = app()->getLocale();
        

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list pay_bases')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pay_base $payBase): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('list pay_bases', $bank)

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

        return $user->hasPermissionTo('create pay_bases')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pay_base $payBase): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('edit pay_bases')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pay_base $payBase): Response
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return $user->hasPermissionTo('delete pay_bases')
        ? Response::allow()
        : Response::deny($translations['you do not have permission']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pay_base $payBase): Response
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pay_base $payBase): Response
    {
        //
    }
}
