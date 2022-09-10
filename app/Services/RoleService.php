<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public static function create($request)
    {
        return Role::create($request->all());
    }

    public static function update($request, $role)
    {
        return $role->update($request->all());
    }
}