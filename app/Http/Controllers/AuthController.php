<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function resetPassword()
    {
        return Inertia::render('Auth/ResetPassword');
    }
}
