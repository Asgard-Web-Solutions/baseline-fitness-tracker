<?php

namespace App\Actions\ExerciseLog;

use App\Models\Exercise;
use App\Models\ExerciseLog;

class CreateExerciseLogEntry
{
    public static function execute(Exercise $exercise, $data)
    {
        ExerciseLog::create([
            'exercise_id' => $exercise->id,
            'user_id' => auth()->user()->id,
            'value' => $data,
        ]);

    }
}
