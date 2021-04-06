<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        User::create(
            $request->validated()
        );
    }

    public function login(LoginRequest $request)
    {
        $credentials_match = Auth::attempt(
            $request->only([
                'email',
                'password',
            ])
        );

        if (!$credentials_match) {
            return response('Invalid credentials', 401);
        }

        $user = User::where([
            'email' => $request->input('email')
        ])->first();

        return $user;
    }
}
