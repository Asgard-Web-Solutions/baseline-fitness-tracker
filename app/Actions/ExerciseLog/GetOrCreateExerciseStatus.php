<?php

namespace App\Actions\ExerciseLog;

use App\Models\Exercise;
use App\Models\ExerciseStatus;
use App\Models\User;

class GetOrCreateExerciseStatus
{
    public static function execute(User $user, Exercise $exercise)
    {
        $exerciseStatus = ExerciseStatus::where('user_id', $user->id)->where('exercise_id', $exercise->id)->first();

        if (!$exerciseStatus) {
            $exerciseStatus = ExerciseStatus::create([
                'exercise_id' => $exercise->id,
                'user_id' => $user->id,
            ]);
        }

        return $exerciseStatus;
    }
}
