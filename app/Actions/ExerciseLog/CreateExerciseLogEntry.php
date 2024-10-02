<?php

namespace App\Actions\ExerciseLog;

use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\ExerciseStatus;

class CreateExerciseLogEntry
{
    public static function execute(Exercise $exercise, $data)
    {
        $exerciseLog = ExerciseLog::create([
            'exercise_id' => $exercise->id,
            'user_id' => auth()->user()->id,
            'value' => $data,
        ]);

        $exerciseStatus = GetOrCreateExerciseStatus::execute(auth()->user(), $exercise);

        UpdateExerciseStatus::execute($exerciseStatus, $exerciseLog);
    }
}
