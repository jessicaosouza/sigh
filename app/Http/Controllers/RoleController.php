<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function list()
    {
        //
    }

    public function store(StoreRoleRequest $request)
    {
        if($role = RoleService::create($request))
        {
            return response(RoleResource::make($role), 201);
        }
        return response('',500);
    }

    public function show(Role $role)
    {
        return response(RoleResource::make($role));
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        if(RoleService::update($request, $role))
        {
            return response('', 200);
        }
        return response('',500);
    }

}
