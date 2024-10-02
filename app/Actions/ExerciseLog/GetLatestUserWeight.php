<?php

namespace App\Actions\ExerciseLog;

use App\Models\User;

class GetLatestUserWeight
{
    public static function execute(User $user)
    {
        return $user->weightLogs()->latest()->first();
    }
}
