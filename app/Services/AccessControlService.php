<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccessControlService
{
    public static function can($functionality)
    {
        for ($i=0; $i < sizeof(auth()->user()->level->functionalities); $i++)
        {
            if(auth()->user()->level->functionalities[$i]->name === $functionality)
            {
                return true;
            }
        }

        return false;
    }

    public static function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return ['status_code'=>401];
        }

        return [
            'user' => $user,
            'token' => $user->createToken('api')->plainTextToken,
            'status_code' => 200
        ];
    }
}