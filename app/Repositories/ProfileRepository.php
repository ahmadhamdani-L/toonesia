<?php

namespace App\Repositories;

use App\Entities\Profile;

class ProfileRepository
{
    public function findByUserId(int $userId): ?Profile
    {
        return Profile::where('user_id', $userId)->first();
    }

    public function updateProfile(int $userId, array $data): Profile
    {
        $profile = $this->findByUserId($userId);
        $profile->update($data);
        return $profile;
    }

    public function deleteProfile(int $userId)
    {
        return Profile::where('user_id', $userId)->delete();
    }
}
