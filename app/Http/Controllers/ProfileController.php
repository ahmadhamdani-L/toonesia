<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show()
    {
        $userId = Auth::id();
        $profile = $this->profileService->getProfile($userId);

        return response()->json($profile, 200);
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        $this->profileService->updateProfile($userId, $request->all());

        return response()->json(['message' => 'Profile updated'], 200);
    }

    public function delete()
    {
        $userId = Auth::id();
        $this->profileService->deleteProfile($userId);

        return response()->json(['message' => 'Profile deleted'], 200);
    }
}
