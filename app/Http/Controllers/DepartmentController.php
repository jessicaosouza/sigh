<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreDepartmentRequest $request)
    {
        if($department = DepartmentService::create($request))
        {
            return response(DepartmentResource::make($department), 201);
        }
        return response('',500);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        if(DepartmentService::update($request, $department))
        {
            return response('', 200);
        }
        return response('',500);
    }

    public function show(Department $department)
    {
        return response(DepartmentResource::make($department), 200);
    }

    public function edit(Department $department)
    {
        //
    }

    public function list()
    {
        //
    }

}
