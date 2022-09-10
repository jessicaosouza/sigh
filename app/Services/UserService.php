<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function create($request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($request->password);
        return User::create($params);
    }

    public static function update($request, $user)
    {
        return $user->update($request->all());
    }
}