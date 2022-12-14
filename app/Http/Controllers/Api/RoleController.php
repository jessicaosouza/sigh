<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function getRoles($request)
    {
        dd("to aqui na funcao");
    }

}
