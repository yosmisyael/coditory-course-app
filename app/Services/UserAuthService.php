<?php

namespace App\Services;

interface UserAuthService
{
    public function login(string $email, string $password): bool;

    public function logout(): void;
}
