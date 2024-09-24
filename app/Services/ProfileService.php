<?php

namespace App\Services;

use App\Entities\Profile;
use App\Repositories\ProfileRepository;

class ProfileService
{
    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function updateProfile($userId, array $data)
    {
        return $this->profileRepository->updateProfile($userId, $data);
    }

    public function getProfile($userId)
    {
        return $this->profileRepository->findByUserId($userId);
    }

    public function deleteProfile($userId)
    {
        return $this->profileRepository->deleteProfile($userId);
    }
}
