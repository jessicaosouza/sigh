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

    public static function getUsers($request){
        return User::query()
            ->when($request->input('search'), function($query, $search){
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);
    }
}