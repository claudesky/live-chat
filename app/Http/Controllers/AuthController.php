<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(RegistrationRequest $request)
    {
        User::create(
            $request->all()
        );
    }
}
