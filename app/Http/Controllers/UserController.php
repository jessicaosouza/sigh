<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return Inertia::render('User/Profile');
    }

    public function updateProfile()
    {
        return Inertia::render('User/UpdateProfile');
    }

    public function index(Request $request)
    {
        return Inertia::render('User/Index', [
            'users' => UserService::getUsers($request),
            'filters' => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function show(User $user)
    {
        return Inertia::render('User/Show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user
        ]);
    }
}
