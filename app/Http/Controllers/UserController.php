<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreUserRequest $request)
    {
        if($user = UserService::create($request))
        {
            return response(UserResource::make($user), 201);
        }
        return response('', 500);
    }

    public function show(User $user)
    {
        return response(UserResource::make($user), 200);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if($user = UserService::update($request, $user))
        {
            return response('', 200);
        }
        return response('', 500);
    }

    public function list(Request $request)
    {
        //
    }
}
