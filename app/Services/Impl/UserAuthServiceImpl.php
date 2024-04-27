<?php

namespace App\Services\Impl;

use Illuminate\Support\Facades\Auth;

class UserAuthServiceImpl
{
    public function login(string $email, string $password): bool
    {
        $credentials = ['email' => $email, 'password' => $password];
        return Auth::attempt($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
