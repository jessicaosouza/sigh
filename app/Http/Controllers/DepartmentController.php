<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Department/Index');
    }

    public function create()
    {
        return Inertia::render('Department/Create');
    }

    public function show(Department $department)
    {
        return Inertia::render('Department/Show', [
            'department' => $department
        ]);
    }

    public function edit(Department $department)
    {
        return Inertia::render('Department/Edit', [
            'department' => $department
        ]);
    }
}
