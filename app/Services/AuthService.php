<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data): string
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->createUser($data);

        return JWTAuth::fromUser($user);
    }

    public function login(array $credentials): ?string
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            return null;
        }

        return $token;
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}

