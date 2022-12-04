<?php

namespace App\Services;

use App\Helpers\Aws;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function store($request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($request->password);
        $response = (Object)[];
        $response->user = User::create($params);

        if(!$request->file('cnh_file')){
            $response->uploaded_file = null;
        }else{
            $response->uploaded_file = Aws::uploadFileS3($request->file('cnh_file'),'users/'.$response->user->id. '/docs/cnh.pdf', env('AWS_BUCKET'));
        }

        return $response;
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