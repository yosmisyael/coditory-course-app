<?php

use App\Services\UserAuthService;
use Database\Seeders\UserSeeder;

describe('UserAuthService', function() {
    beforeEach(function () {
        $this->seed(UserSeeder::class);
        $this->userAuthService = app()->make(UserAuthService::class);
    });

    it('should return true for login attempts with valid credentials', function () {
        expect($this->userAuthService->login('test@test.com', 'password'))->toBeTrue();
    });

    it('should return false or login attempts with invalid credentials', function () {
        expect($this->userAuthService->login('test@test.com', 'wrong'))->toBeFalse();
    });

    it('should logout user', function () {
        $this->userAuthService->login('test@test.com', 'password');
        $this->assertAuthenticated();

        $this->userAuthService->logout();
        expect(auth()->user())->toBeNull();
    });
});
