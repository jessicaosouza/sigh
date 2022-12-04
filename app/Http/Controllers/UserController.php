<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\Level;
use App\Models\Role;
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
        return Inertia::render('User/Create', [
            'levels' => Level::all(),
            'roles' => Role::all(),
        ]);
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
            'user' => $user,
            'levels' => Level::all(),
            'roles' => Role::all(),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $response = UserService::store($request);
        if($response->user && $response->uploaded_file){
            return redirect()->route('users.show', $response->user->id);
        }
        return redirect()->back()->withErrors([
            'uploaded_file' => $response->uploaded_file,
            'created_user' => $response->user ? $response->user->id : null
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        dd("aqui no update");
    }
}
