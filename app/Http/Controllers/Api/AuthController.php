<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\AccessControlService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if($res = AccessControlService::login($request))
        {
            if(!isset($res['user']))
                return response('',$res['status_code']);

            return response([
                'user' => UserResource::make($res['user']),
                'token' => $res['token']
            ], $res['status_code']);
        }
        return response('',500);
    }
}
