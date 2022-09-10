<?php

namespace App\Services;

use App\Models\Department;

class DepartmentService
{
    public static function create($request)
    {
        return Department::create($request->all());
    }

    public static function update($request, $department)
    {
        return $department->update($request->all());
    }
}