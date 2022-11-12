<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Role/Index', [
            'roles' => Role::query()
                ->when($request->input('search'), function($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]),
            'filters' => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Role/Create');
    }

    public function show(Role $role)
    {
        return Inertia::render('Role/Show', [
            'role' => $role
        ]);
    }

    public function edit(Role $role)
    {
        return Inertia::render('Role/Edit', [
            'role' => $role
        ]);
    }
}
