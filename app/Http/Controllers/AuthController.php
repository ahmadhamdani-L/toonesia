<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;

    // Gunakan dependency injection di constructor
    public function __construct(AuthService $authService)
    {
        // $this->authService = $authService;
    }

    public function register(Request $request)
    {
        dd('register');
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required'
        ]);
        dd('Validate Successfully');

        // Panggil method register dari AuthService
        $token = $this->authService->register($request->all());

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Pastikan validasi tetap berjalan
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $token = $this->authService->login($request->only('email', 'password'));

        if (!$token) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token], 200);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
